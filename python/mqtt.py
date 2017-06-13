import os
from dotenv import load_dotenv
import logging
import asyncio
from hbmqtt.client import MQTTClient, ClientException
from hbmqtt.mqtt.constants import QOS_1, QOS_2
import pymysql.cursors

logger = logging.getLogger(__name__)

@asyncio.coroutine
def uptime():
    C = MQTTClient()
    yield from C.connect(url)
    yield from C.subscribe([(uid+'/#', QOS_1)],)
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
    table = topic.split('/')[1]
    column = topic.split('/')[2]
    value = recv
    connection = pymysql.connect(host=host,user=user,password=password,db=db,
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)
    try:
        with connection.cursor() as cursor:
            sql = "UPDATE `dae`.`demand_settings` SET `value` = '900' WHERE `demand_settings`.`id` = 1"
            #sql = "INSERT INTO `"+table+"` (`email`, `password`) VALUES (%s)"
            cursor.execute(sql)
        connection.commit()
    finally:
        connection.close()

    '''
    if(recv == bytearray(b'down')):
        os.system('php %s/artisan down'%(dist))
        print("web down")
    if(recv == bytearray(b'up')):
        os.system('php %s/artisan up'%(dist))
        print(" web up")
    '''

if __name__ == '__main__':
    formatter = "[%(asctime)s] {%(filename)s:%(lineno)d} %(levelname)s - %(message)s"
    logging.basicConfig(level=logging.INFO,format=formatter, filename='../log.txt')
    logging.basicConfig(level=logging.DEBUG,format=formatter, filename='../log.txt')
    env = os.path.join('..','.env')
    load_dotenv(env)
    host = os.environ.get("DB_HOST")
    db = os.environ.get("DB_DATABASE")
    user = os.environ.get("DB_USERNAME")
    password = os.environ.get("DB_PASSWORD")
    uid = os.environ.get("UUID")
    url = os.environ.get("BROKER_URL")
    asyncio.get_event_loop().run_until_complete(uptime())