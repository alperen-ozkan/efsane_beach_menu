from django.db import models


class Category(models.Model):
    name = models.CharField(max_length=100, verbose_name="Ad")
    slag = models.CharField(
        max_length=100,
        verbose_name="Link",
        help_text='Kategorinin URL için uygun formatını giriniz. Örnek olarak "Kahvaltı" için "kahvalti" veya "breakfast."',
    )
    image = models.ImageField(upload_to="images", null=True, verbose_name="Fotoğraf")

    def __str__(self):
        return self.name

    class Meta:
        verbose_name = "Kategori"
        verbose_name_plural = "Kategoriler"


class Product(models.Model):
    category = models.ForeignKey(
        Category, on_delete=models.CASCADE, verbose_name="Kategori"
    )
    title = models.CharField(max_length=100, verbose_name="Başlık")
    description = models.CharField(
        max_length=300, null=True, blank=True, verbose_name="Açıklama"
    )
    price = models.IntegerField(default=0, verbose_name="Fiyat (TL)")
    image = models.ImageField(upload_to="images", null=True, verbose_name="Fotoğraf")

    class Meta:
        verbose_name = "Ürün"
        verbose_name_plural = "Ürünler"
