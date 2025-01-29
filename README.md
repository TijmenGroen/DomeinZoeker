# Domeinzoeker
Met de domeinzoeker kan je domeinen zoeken op de homepagina. Deze kan je, mits je ingelogd bent, toevoegen aan je winkelwagen. De domeinen kunnen ook uit de winkelwagen verwijderd worden.  
  
Je kunt een account aanmaken of met een bestaand account inloggen. Als je ingelogd bent kan je op de account pagina bestellingen zien. 

## REST API
Om de API aan te roepen heb ik guzzlehttp gebruikt. Deze wordt gebruikt in **resultPage.php**

## Database
### Model
De ERD van de database die ik heb gemaakt staat hieronder:
![erd](/docs/erd.png)  
De .sql file van de database is aanwezig in de docs folder.

### .env
Om met de database te connecten heb ik **phpdotenv** gebruikt om de database credentials op te slaan.  
Deze heeft de volgende structuur:  
```.env
DB_HOST=XXXX
DB_NAME=XXXX
DB_USERNAME=XXXX
DB_PASSWORD=XXXX
```
