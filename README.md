# GUS API Administracyjno-geolokalizacyjne

RESTowe API dostarczające:
- struktury administracyjne
	- województwa
	- powiaty
	- gminy
	- miasta, dzielnice i delegatury
	- wsie
	- ulice
- współrzędne geograficzne struktur administracyjnych budowane przyrostowo dla zadanych requestów


# Instalacja
```bash
git clone git@github.com:devbay-pl/api-geo.git
cd api-geo
composer install
```
Następnie na podstaiwe pliku `.env.dist` utwórz `.env` z własną konfiguracją.

Migrację schematów bazy danych uruchomisz poleceniem:
```bash
bin/console doctrine:schema:update --force
```

By wlać podstawowe dane administracyjne do bazy danych uruchom:
```bash
bin/console app:import
```

# Endpointy

| Status | Endpoint | Metoda | Opis | Parametry |
|--|--|--|--|--|
| :white_check_mark: | `/api/v1/provinces` | GET | Listing wszystkich województw | TODO |
| :x: | `/api/v1/provinces/{id}` | GET | Detal województwa o wskazanym `id` | TODO |
| :white_check_mark: | `/api/v1/counties` | GET | Listing wszystkich powiatów | TODO |
| :x: | `/api/v1/counties/{id}` | GET | Detal powiatu o wskazanym `id` | TODO|
| :x: | `/api/v1/communes` | GET | Listing wszystkich gmin | TODO |
| :x: | `/api/v1/communes/{id}` | GET | Detal gminy o danym `id` | TODO
| :white_check_mark: | TODO... | TODO... | TODO | TODO
| :x: | `/_health` | GET | Informacje o stanie usługi | TODO

# Współtwórcy
- Filip Nowacki - [@fnowacki](https://github.com/fnowacki)

Oraz cała [społeczność DevBay Community](https://github.com/devbay-pl/api-geo/graphs/contributors).

<sub>Aby znaleźć się na tej liście, wystaw co najmniej 3 pull requesty.</sub>