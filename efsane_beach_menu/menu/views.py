from django.shortcuts import render, redirect
from django.http import HttpRequest

from .models import Category, Product


def index(request: HttpRequest):
    categories = Category.objects.all()

    context = {"categories": categories}

    return render(request, "menu/index.html", context)


def category(request: HttpRequest, category_slag: str):
    category = Category.objects.get(slag=category_slag)

    products = Product.objects.filter(category=category)

    context = {"category_name": category.name, "products": products}

    return render(request, "menu/category.html", context)


def search(request: HttpRequest):
    products = Product.objects.all()

    search_content = request.GET.get("search-content")
    if search_content:
        searched_products = list(
            filter(
                lambda product: search_content.lower() in product.title.lower(),
                products,
            )
        )

        context = {
            "search_content": search_content,
            "products": searched_products,
        }

        return render(request, "menu/search.html", context)

    return redirect("index")


def contact(request):
    return render(request, "menu/contact.html")
