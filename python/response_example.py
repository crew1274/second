import logging
import asyncio
import os
from hbmqtt.client import MQTTClient, ClientException
from hbmqtt.mqtt.constants import QOS_1, QOS_2

logger = logging.getLogger(__name__)
url = 'mqtt://140.116.39.212:1883'
topic = '4161565f-956d-4bb0-b39b-72257dc099e8/response/update/offloads'

@asyncio.coroutine
def uptime_coro():
    C = MQTTClient()
    yield from C.connect(url)
    yield from C.subscribe([(topic, QOS_1),(topic, QOS_2)],)
    logger.info("Subscribed")
    i=1
    try:
        while i:
            message = yield from C.deliver_message()
            packet = message.publish_packet
            print(packet.payload.data)
            print("%d: %s => %s" % (i, packet.variable_header.topic_name, str(packet.payload.data)))
            i=i+1
        yield from C.unsubscribe([topic,topic])
        logger.info("UnSubscribed")
        yield from C.disconnect()
    except ClientException as ce:
        logger.error("Client exception: %s" % ce)

if __name__ == '__main__':
    formatter = "[%(asctime)s] {%(filename)s:%(lineno)d} %(levelname)s - %(message)s"
    logging.basicConfig(level=logging.INFO, format=formatter)
    logging.basicConfig(level=logging.DEBUG, format=formatter)
    asyncio.get_event_loop().run_until_complete(uptime_coro())