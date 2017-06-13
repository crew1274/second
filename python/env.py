import os
from dotenv import load_dotenv
import base64
if __name__ == '__main__':

    env = os.path.join('..','.env')
    load_dotenv(env)
    host = os.environ.get("DB_HOST")
    db = os.environ.get("DB_DATABASE")
    user = os.environ.get("DB_USERNAME")
    password = os.environ.get("DB_PASSWORD")
    uid = unicode(base64.b64decode(os.environ.get("APP_KEY").split(':')[1]))
    print(uid)
