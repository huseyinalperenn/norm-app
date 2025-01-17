## Hüseyin Telli - Norm Bitkisel Quiz

### Sistem Özellikleri

* Laravel 11
* MySQL 8
* PHP 8.4

### Teknik Detaylar

### Sistem üzerinde Laravel Sail kullanıldı. Sail üzerinde Redis ve Mailpit paketleri kuruldu. Sistem modüler mimari olarak tasarlandı. Ek olarak Repository Pattern kullanıldı. Her bir modüle "modules" klasörü altından ulaşabilirsiniz.

### Mevcut Modüller

* Checkout
* * Checkout modülü, kullanıcının ürünlerini eklediği bir sepet barındırır. Ve bu sepet üzerinden sipariş oluşturmasını sağlar.
* Products
* * Products modülü, sistemin "products" tablosunu oluşturup bu ürünlerin listeme işlemini yapar.
* Shipping
* * Shipping modülü, sistemde "shippings" tablosunu oluşturup sipariş oluştururken kullanılacak kargo firmasını seçme işlemini yapar.

### Genel Detaylar
Anasayfada önceden dummy data oluşturulmuş ürünler listelenir. Kullanıcı hesabına giriş yaparak sepetine ürünler ekleyebilir bu ürünlerin sepet üzerinden sil, miktarı artır, miktarı azalt gibi modifikasyonları gerçekleştirebilir. Kullanıcı eğer hesabına giriş yapmadıysa sepetine ürün ekleyemez. Kullanıcı sepetine ürün ekledikten sonra sepet sayfasında "Sepeti Tamamla" butonuna tıklar ve teslimat detayları sayfasına ulaşır. Bu sayfada yeni bir teslimat adresi ekleyebilir veya daha önceden eklediği teslimat adreslerinden birini seçebilir. Daha sonrasında teslimat türünden herhangi bir firmayı seçerek teslimat ücretini öğrenebilir. Kullanıcı sipariş ver butonuna tıkladığında sipariş başarılı sayfasına yönlendirilir ve sipariş numarası kullanıcıya bu ekranda gösterilir.

### Projeyi Çalıştırma

```bash
docker run --rm \
    --pull=always \
    -v "$(pwd)":/opt \
    -w /opt \
    laravelsail/php84-composer:latest \
    bash -c "laravel new norm-app --no-interaction"
```

```bash
./vendor/bin/sail up -d
```

```bash
./vendor/bin/sail artisan migrate --seed
```

### Test Kullanıcısı Oluşturma

```bash
./vendor/bin/sail artisan app:create-user
```

### Test Kulanıcısı Giriş Bilgileri

```
E-posta: test@example.com
Şifre: password
```
