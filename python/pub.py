import logging
import asyncio
from hbmqtt.client import MQTTClient, ConnectException
from hbmqtt.mqtt.constants import *

logger = logging.getLogger(__name__)

url = 'mqtt://140.116.39.225:1883'
topic = '09ea6335-d2bd-4678-9ca9-647b5574a09e/go/test'

@asyncio.coroutine
def test(command):
    try:
        C = MQTTClient()
        yield from C.connect(url)
        message = yield from C.publish(topic, command.encode(), qos=0x00)
        #message = yield from C.publish(topic, command.encode(), qos=0x01)
        #message = yield from C.publish(topic, command.encode(), qos=0x02)
        logger.info("messages %s published" %(command))
        print("messages %s published" %(command))
        yield from C.disconnect()
    except ConnectException as ce:
        logger.error("Connection failed: %s" % ce)
        asyncio.get_event_loop().stop()

@asyncio.coroutine
def test_coro():
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
    #定義log輸出模式
    formatter = "[%(asctime)s] %(name)s {%(filename)s:%(lineno)d} %(levelname)s - %(message)s"
    formatter = "%(message)s"
    #發布訊息
    asyncio.get_event_loop().run_until_complete(test('upgrade'))
    #asyncio.get_event_loop().run_until_complete(test('down'))