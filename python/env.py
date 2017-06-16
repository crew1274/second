import requests
import json
import os


def main():
    # send demand settings to server
    demand_settings_url = 'http://140.116.39.223/api/demand_setting'
    json_content = get_web_content(demand_settings_url)
    demand_settings = json.loads(json_content)
    response = post_data_to_server(demand_settings)
    print(response)

    # send boot settings to server
    boot_url = 'http://140.116.39.223/api/boot'
    json_content = get_web_content(boot_url)
    boot_settings = json.loads(json_content)
    response = post_data_to_server(boot_settings)
    print(response)

    # do something

def post_data_to_server(data):
    try:
        # api url
        server_api_path = "http://140.116.39.171:5000/api/v1.0/demand"
        json_data = json.dumps(data)
        response = requests.post(server_api_path, json_data, timeout=3)

        return response

    except:
        print("Unexcepted error: {0}".format(sys.exc_info()[0]))
        raise


def get_web_content(url):
    response = requests.get(url)
    status_code = response.status_code
    byte_content = response.content
    # convert byte to string
    content = str(byte_content, 'utf-8')

    return content


if __name__ == '__main__':
    main()