import logging
import asyncio
from hbmqtt.client import MQTTClient, ConnectException
from hbmqtt.mqtt.constants import *
import json
logger = logging.getLogger(__name__)

url = 'mqtt://140.116.39.225:1883'
topic = '09ea6335-d2bd-4678-9ca9-647b5574a09e/query/offloads'
#topic = '09ea6335-d2bd-4678-9ca9-647b5574a09e/insert/settings'
#topic = '09ea6335-d2bd-4678-9ca9-647b5574a09e/update/settings'
#topic = '09ea6335-d2bd-4678-9ca9-647b5574a09e/query/settings'
#topic = '09ea6335-d2bd-4678-9ca9-647b5574a09e/delete/settings'
#共10個欄位
#payload = '{"value":"900","value_max":"800","value_min":"500","load_off_gap":"0","reload_delay":"1","reload_gap":"0","cycle":"15","mode":"\u5148\u5378\u5148\u5fa9\u6b78","group":"\u6a21\u7d44\u5e38\u95dc","created_at":"2017-06-15 02:37:31"}'
#payload ='{"id":"2"}'
payload ='{"model":"PM100","address":"2","ch":"2","speed":"9600","circuit":"7","created_at":"2017-06-15 04:45:42","updated_at":"2017-06-15 04:44:42"}'
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