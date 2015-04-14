from createdb import PlantDatabase
import sys

def gen_insert_val_clause(plant,system,sensor):
    s="""
        sensor=0
        for plant_row in c.execute("SELECT * FROM Plants WHERE Name = '%s' "):
            for sys_row in c.execute("SELECT * FROM Systems WHERE Type = '%s'"):
                for sens_row in c.execute("SELECT * FROM Sensors WHERE Type = '%s'"):
                    if sys_row[2] == plant_row[0] and sens_row[2] == sys_row[0]:
                        sensor = sens_row[0]
        value = factory.get_sensor_value('%s', '%s', '%s')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")"""
    return s % (plant,system,sensor,plant,system,sensor)


def header():
    return """
###############################################
## data loader. Run as a cron job evey minute
###############################################
import sqlite3
import factory
import time

c = sqlite3.connect("plants.db").cursor()

end = time.time() + 2
last = time.time()
while (time.time() < end):
    if (time.time() - last > 1):
        last = time.time()
"""

def sensor_insert_clauses():
    badcode = ""
    plants = ["PlantZero", "PlantOne", "PlantTwo", "PlantThree", "PlantFour"]
    for plant in plants:
        for sys in PlantDatabase.system_types:
            for sen in PlantDatabase.sensor_types:
                 badcode += gen_insert_val_clause(plant,sys,sen)
    return badcode

def generate(filename = None):
    badcode = header() + sensor_insert_clauses()
    #now add some awful and complicated system status update code
    #then add some creative reports, like the average sensor values by location
    if filename:
        with open(filename, 'w') as f:
            f.write(badcode)
    else:
        print(badcode)

if __name__ == "__main__":
    if len(sys.argv) > 1:
        generate(sys.argv[1])
    else:
        generate()


