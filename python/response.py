import asyncio
from hbmqtt.client import MQTTClient, ConnectException
from hbmqtt.mqtt.constants import *
import sys
from dotenv import load_dotenv
import os
import json
import requests

env = os.path.join(os.path.dirname(__file__),'..', '.env')
load_dotenv(env)
url = os.environ.get("BROKER_URL")
uid = os.environ.get("UUID")
topic = os.environ.get("UUID")+"/response/"+sys.argv[1]+"/"+sys.argv[2]
payload = '{"status":"fail"}'
if  sys.argv[3] == 'ok':
    payload = '{"status":"ok"}'
if sys.argv[1] == 'query':
    if sys.argv[2] == 'offloads':
        if sys.platform == 'linux':
            api = "http://localhost/api/"+uid+"/offload"
        else:
            api = "http://localhost/real_time/public/api/"+uid+"/offload"
        payload = str(requests.get(api).content,'utf-8')
    elif sys.argv[2] == 'settings':
        if sys.platform == 'linux':
            api = "http://localhost/api/"+uid+"/boot"
        else:
            api = "http://localhost/real_time/public/api/"+uid+"/boot"
        payload = str(requests.get(api).content,'utf-8')
    elif sys.argv[2] == 'demand_settings':
        if sys.platform == 'linux':
            api = "http://localhost/api/"+uid+"/demand_setting"
        else:
            api = "http://localhost/real_time/public/api/"+uid+"/demand_setting"
        payload = str(requests.get(api).content,'utf-8')

if sys.argv[1] == 'insert' and sys.argv[2] == 'settings' and sys.argv[3] == 'ok':
    try:
        payload = '{"status":"ok","id":'+sys.argv[4]+'}'
    except:
        payload = '{"status":"ok"}'

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
