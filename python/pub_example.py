import logging
import asyncio
from hbmqtt.client import MQTTClient, ConnectException
from hbmqtt.mqtt.constants import *
import json
logger = logging.getLogger(__name__)

url = 'mqtt://140.116.39.212:1883'
topic = '4161565f-956d-4bb0-b39b-72257dc099e8/update/offloads'
payload = '{"group": 9,"available":true,"boolean": false}'
#payload = '{"value":"900","value_max":"800","value_min":"500","load_off_gap":"1","reload_delay":"1","reload_gap":"0","cycle":"15","mode":"\u5148\u5378\u5148\u5fa9\u6b78","group":"\u6a21\u7d44\u5e38\u95dc","created_at":"2017-06-15 02:37:31"}'
#payload ='{"id":"5"}'
#payload ='{"id":"7","model":"PM100","address":"3","ch":"6","speed":"9600","circuit":"10","updated_at":"2017-06-15 04:44:42"}'
#payload ='{"model":"PM100","address":"3","ch":"6","speed":"9600","circuit":"10","created_at":"2017-06-15 04:44:42"}'
@asyncio.coroutine
def pub(payload):
    try:
        C = MQTTClient()
        yield from C.connect(url)
        #message = yield from C.publish(topic, payload.encode(), qos=0x00)
        message = yield from C.publish(topic, payload.encode(), qos=0x01)
        #message = yield from C.publish(topic, payload.encode(), qos=0x02)
        logger.info("messages %s published" %(payload))
        print("messages %s published" %(payload))
        yield from C.disconnect()
    except ConnectException as ce:
        logger.error("Connection failed: %s" % ce)
        asyncio.get_event_loop().stop()

@asyncio.coroutine
def test():
    C = MQTTClient()
    yield from C.connect(url)
    tasks = [
        asyncio.ensure_future(C.publish(topic , b'up',qos=QOS_0)),
        asyncio.ensure_future(C.publish(topic , b'2', qos=QOS_1)),
        asyncio.ensure_future(C.publish(topic , b'3', qos=QOS_2)),
    ]
    yield from asyncio.wait(tasks)
    logger.info("messages published")
    yield from C.disconnect()

if __name__ == '__main__':
    formatter = "[%(asctime)s] {%(filename)s:%(lineno)d} %(levelname)s - %(message)s"
    logging.basicConfig(level=logging.INFO,format=formatter)
    #發布訊息
    asyncio.get_event_loop().run_until_complete(pub(payload))
    #asyncio.get_event_loop().run_until_complete(test('payload'))
    #print("%s" %(json.loads(payload)))