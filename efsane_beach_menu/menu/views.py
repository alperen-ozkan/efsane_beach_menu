from django.shortcuts import render, HttpResponse

from .models import Category, Product


def index(request):
    categories = Category.objects.all()

    context = {
        'categories': categories
    }

    return render(request, 'menu/index.html', context)


def category(request, category_slag):
    category = Category.objects.get(slag=category_slag)

    products = Product.objects.filter(category=category)

    context = {
        'products': products
    }

    return render(request, 'menu/category.html', context)
