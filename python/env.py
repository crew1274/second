import json 
import os
controljson = os.path.join(os.path.dirname(__file__),'..','storage','app','control.json')
data=json.loads( open(controljson).read())
tmp = data
data['control'][1-1]['boolean'] = False
print(tmp['control'][1]['group'])
jsonFile = open("replay.json", "w+")
jsonFile.write(json.dumps(data))
jsonFile.close()
