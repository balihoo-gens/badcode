from createdb import PlantDatabase

def gen_insert_val_clause(plant,system,sensor):
    return """
    for row in c.execute("SELECT * FROM Plants WHERE Name = '%s'"):
        plant = row[0]
    for row in c.execute("SELECT * FROM Systems WHERE Type = '%s' AND PlantId = " + str(plant)):
        system = row[0]
    for row in c.execute("SELECT * FROM Sensors WHERE Type = '%s' AND SystemId = " + str(system)):
        sensor = row[0]
    value = factory.get_sensor_value('%s', '%s', '%s')
    c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")
    """ % (plant,system,sensor,plant,system,sensor)

plants = ["PlantZero", "PlantOne", "PlantTwo", "PlantThree", "PlantFour"]
for plant in plants:
    for sys in PlantDatabase.system_types:
        for sen in PlantDatabase.sensor_types:
             print(gen_insert_val_clause(plant,sys,sen))
