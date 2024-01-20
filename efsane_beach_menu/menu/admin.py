from django.contrib import admin

from .models import Category, Product


@admin.register(Category)
class CategoryAdmin(admin.ModelAdmin):
    list_display = ("name", "image")


@admin.register(Product)
class ProductAdmin(admin.ModelAdmin):
    list_display = ("category", "title", "description", "price", "image")

