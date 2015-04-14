from createdb import PlantDatabase

def gen_insert_val_clause(plant,system,sensor):
    s="""        for row in c.execute("SELECT * FROM Plants"):
            if row[1] == '%s':
                plant = row[0]
        for row in c.execute("SELECT * FROM Systems"):
            if row[2] == plant and row[1] == "%s":
                system = row[0]
        for row in c.execute("SELECT * FROM Sensors"):
            if row[2] == system and row[1] == "%s":
                sensor = row[0]
        value = factory.get_sensor_value('%s', '%s', '%s')
        c.execute("INSERT INTO SensorValues VALUES (" + str(time.time()) + "," + str(sensor) + "," + str(value) + ")")"""
    return s % (plant,system,sensor,plant,system,sensor)

plants = ["PlantZero", "PlantOne", "PlantTwo", "PlantThree", "PlantFour"]
for plant in plants:
    for sys in PlantDatabase.system_types:
        for sen in PlantDatabase.sensor_types:
             print(gen_insert_val_clause(plant,sys,sen))
