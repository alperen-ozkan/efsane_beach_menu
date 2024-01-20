# Efsane Beach Menu Projesi

![Static Badge](https://img.shields.io/badge/Python-3.12.0-blue)
![Static Badge](https://img.shields.io/badge/Django-5.0.1-green)

Sanal ortamı oluştur.

```
python -m virtualenv venv
```

Gerekli paketleri yükle.

```
pip install -r requirements.txt
```

Veri tabanını oluştur.

```
cd efsane_beach_menu
python manage.py makemigrations
python manage.py migrate
```

Sunucuyu başlat.

```
python manage.py runserver
```
