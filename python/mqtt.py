import os
from dotenv import load_dotenv
import logging
import asyncio
from hbmqtt.client import MQTTClient, ClientException
from hbmqtt.mqtt.constants import QOS_1, QOS_2
import pymysql.cursors
import json
import sys
import requests

logger = logging.getLogger(__name__)
@asyncio.coroutine
def uptime():
    C = MQTTClient()
    yield from C.connect(url)
    yield from C.subscribe([(uid+"/#", QOS_1)],)
    logger.info("Subscribed %s/%s" %(url,uid))
    print("Subscribed %s/%s" %(url,uid))
    i=1
    try:
        while i:
            message = yield from C.deliver_message()
            packet = message.publish_packet
            command( packet.variable_header.topic_name, packet.payload.data)
            print("%d: %s => %s" %(i,packet.variable_header.topic_name,str(packet.payload.data)))
            logger.info("%d: %s => %s" %(i,packet.variable_header.topic_name,str(packet.payload.data)))
            i=i+1
        yield from C.unsubscribe([uid,uid])
        logger.info("UnSubscribed %s/%s" %(url,uid))
        yield from C.disconnect()
    except ClientException as ce:
        logger.error("Client exception: %s" % ce)

def command( topic, recv ):
    action = topic.split('/')[1]
    table = topic.split('/')[2]
    payload = recv.decode()
    connection = pymysql.connect(host=host,user=user,password=password,db=db,
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)
    
    if action == 'insert' and table=='demand_settings':
        try:            
            with connection.cursor() as cursor:
                sql = "INSERT INTO `"+db+"`.`"+table+"` (`value`, `value_max`, `value_min`, `load_off_gap`, `reload_delay`, `reload_gap`, `cycle`, `mode`, `group`, `created_at`) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"
                cursor.execute(sql,(json.loads(payload)['value'],json.loads(payload)['value_max'],json.loads(payload)['value_min'],json.loads(payload)['load_off_gap'],json.loads(payload)['reload_delay'],json.loads(payload)['reload_gap'],json.loads(payload)['cycle'],json.loads(payload)['mode'],json.loads(payload)['group'],json.loads(payload)['created_at']))
            connection.commit()
            response(action,table,'{"status":"ok"}')
        finally:
            connection.close()
                       
    if action == 'insert' and table=='settings':
        try:            
            with connection.cursor() as cursor:
                sql = "INSERT INTO `"+db+"`.`"+table+"` ( `model`, `address`, `ch`, `speed`, `circuit`, `created_at`) VALUES (%s,%s,%s,%s,%s,%s)"
                cursor.execute(sql,(json.loads(payload)['model'],json.loads(payload)['address'],json.loads(payload)['ch'],json.loads(payload)['speed'],json.loads(payload)['circuit'],json.loads(payload)['created_at']))
            connection.commit()
            response(action,table,'{"status":"ok"}')
        finally:
            connection.close()

    if action == 'update' and table=='settings':
        try:            
            with connection.cursor() as cursor:
                sql = "UPDATE `"+db+"`.`"+table+"` SET `model` = %s, `address`= %s, `ch`= %s, `speed`= %s, `circuit`= %s, `updated_at`= %s WHERE `"+table+"`.`id` = %s"
                cursor.execute(sql,(json.loads(payload)['model'],json.loads(payload)['address'],json.loads(payload)['ch'],json.loads(payload)['speed'],json.loads(payload)['circuit'],json.loads(payload)['updated_at'],json.loads(payload)['id']))
            connection.commit()
            response(action,table,'{"status":"ok"}')
        finally:
            connection.close()
    
    if action == 'delete' and table=='settings':
        try:            
            with connection.cursor() as cursor:
                sql = "DELETE FROM `"+db+"`.`"+table+"` WHERE `"+table+"`.`id` = %s"
                cursor.execute(sql,(json.loads(payload)['id']))
            connection.commit()
            response(action,table,'{"status":"ok"}')
        finally:
            connection.close()
    if action == 'query' and table=='settings':
        if sys.platform == 'linux':
            api = "http://localhost/api/boot"
        else:
            api = "http://localhost/real_time/public/api/boot"
        try:
            cont=str(requests.get(api).content,'utf-8')
        finally:
            response(action,table,cont)

    if action == 'query' and table =='demand_settings':
        if sys.platform == 'linux':
            api = "http://localhost/api/demand_setting"
        else:
            api = "http://localhost/real_time/public/api/demand_setting"
        try:
            cont=str(requests.get(api).content,'utf-8')
        finally:
            response(action,table,cont)

def response(action,table,payload):
    if sys.platform == 'linux':
        os.system("python3 %s %s %s %s"%(resp,action,table,payload))
    else:
        os.system("python %s %s %s %s"%(resp,action,table,payload))

if __name__ == '__main__':
    env = os.path.join(os.path.dirname(__file__),'..', '.env')
    log = os.path.join(os.path.dirname(__file__),'..', 'log.txt')
    resp = os.path.join(os.path.dirname(__file__), 'response.py')
    formatter = "[%(asctime)s] {%(filename)s:%(lineno)d} %(levelname)s - %(message)s"
    logging.basicConfig(level=logging.INFO,format=formatter, filename=log)
    logging.basicConfig(level=logging.DEBUG,format=formatter, filename=log)
    load_dotenv(env)
    host = os.environ.get("DB_HOST")
    db = os.environ.get("DB_DATABASE")
    user = os.environ.get("DB_USERNAME")
    password = os.environ.get("DB_PASSWORD")
    uid = os.environ.get("UUID")
    url = os.environ.get("BROKER_URL")

    asyncio.get_event_loop().run_until_complete(uptime())