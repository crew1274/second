import pymysql.cursors
import time
import sys

if sys.platform != 'linux':
    print("Not linux env.")
    exit()

else:
    sys.path.insert(0, '/home/pi/workspace/DAESecondStage/')

import DAE.MySQL as daesql
import DAE.DBConfig as dbconfig


def main():
    global sqlObj
    sqlObj = daesql.MySQL(dbconfig.mysql)

    try:
        sql = "UPDATE `demand`.`settings` SET `token` = '1' WHERE `settings`.`id` = {0};".format(sys.argv[1])
        sqlObj.executeSQL(sql)
        print("id:",str(sys.argv[1]), "vaild Successfully!")
        print("驗證成功!")
    finally:
        sqlObj.close()


if __name__ == '__main__':
    main()
