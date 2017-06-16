import asyncio
from hbmqtt.client import MQTTClient, ConnectException
from hbmqtt.mqtt.constants import *
import sys
from dotenv import load_dotenv
import os
env = os.path.join(os.path.dirname(__file__),'..', '.env')
load_dotenv(env)
url = os.environ.get("BROKER_URL")
topic = os.environ.get("UUID")+"/response/"+sys.argv[1]+"/"+sys.argv[2]
payload = sys.argv[3]
@asyncio.coroutine
def response(url,topic,status):
    print(status)
    try:
        Conn = MQTTClient()
        yield from Conn.connect(url)
        #message = yield from Conn.publish(topic, status.encode(), qos=0x00)
        message = yield from Conn.publish(topic, status.encode(), qos=0x01)
        #message = yield from Conn.publish(topic, status.encode(), qos=0x02)
        print("messages %s published" %(status))
        yield from Conn.disconnect()
    except ConnectException as ce:
        asyncio.get_event_loop().stop()

if __name__ == '__main__':
    print("Publish %s to %s/%s"%(payload,url,topic))
    asyncio.get_event_loop().run_until_complete(response(url,topic,payload))
