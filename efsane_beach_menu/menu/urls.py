from django.urls import path

from . import views

urlpatterns = [
    path("", views.index, name="index"),
    path("category/<str:category_slag>/", views.category, name="category"),
    path("search/", views.search, name="search"),
    path("contact/", views.contact, name="contact"),
]
