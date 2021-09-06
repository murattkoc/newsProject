# DergiPark Kurulum ve Temel Gereksinim Kılavuzu

Bu doküman, DergiPark sistemini bilgisayarında ya da sunucuda çalıştırmak için kuranlara yönelik sistem gereksinimlerinin, kurulacak servislerin sağlanması ve gerekli ayarların yapılması amacıyla oluşturulmuştur.

------
[![N|Solid](https://www.ankarateknokent.com/wp-content/uploads/2019/07/Yonca-Teknoloji-Logo.png)](https://nodesource.com/products/nsolid)
tarafından hazırlanmıştır. 

------
**Version 1**
<br>
# Dokümantasyon
DergiPark sisteminin ayağa kaldırılması için gerekli ayarlar ve konfigürasyonlar dokümantasyon başlığı altından itibaren gösterilmektedir. Bu belge hazırlanırken kullanılan teknolojilerin kaynak sayfaları referans alınmıştır.

**Not:** Bu doküman kapsamında kullanılan bileşenlerin tümünün sürümleri birbirleriyle uyumlu olmak zorundadır.

### Kurulum

DergiPark için Symfony 2.8.* sürümü gerekmektedir.

### 1. PHP ve PHP-FPM Kurulumu
     PHP 7.3 ve PHP-FPM 7.3 versiyonu seçilmelidir.
### 2. Postgresql ve Postgresql-contrib Kurulumu
    Postgresql-9.5 versiyonu seçilmelidir.
    Postgresql-contrib-9.5 versiyonu seçilmelidir.
### 3. ElasticSearch Kurulumu
     Elasticsearch 2.4.4 versiyonu seçilmelidir.
     apt-transport-https yüklemesi yapılmalıdır.
     Elasticsearch sistemi Türkçe dil desteği için icu plugin eklentisi yüklenmelidir.
     Bilgisayar açıldığında elasticsearch’ün otomatik olarak koşması için daemon ayarı yapılmalıdır.
     /usr/share/elasticsearch dizinine 777 izinleri tanımlanmalıdır.
     /usr/share/elasticsearch/config dizinine 777 izinleri tanımlanmalıdır.
     ln -s /etc/elasticsearch/ /usr/share/elasticsearch/config sembolik link verilmelidir.
     İşlemler sonunda servisin durumu kontrol edilmelidir.

### 4. PHP Gerekli Extension Kurulumu
    a. php7.3-apcu
    b. php7.3-apcu-bc 
    c. php7.3-memcached 
    d. php7.3-xdebug
    e. php7.3-xml
    d. php7.3-curl
    e. php7.3-gd
    f. php-7.3-pgsql
### 5. Java Jdk-8 Kurulumu ve Konfigürasyonu
     Java openjdk-8-jdk yüklenmelidir.
     JAVA_HOME path ayarı ve  PATH değişkenine JAVA bin dizin eklemesi yapılmalıdır.
     İşlemler sonunda java versiyonu kontrol edilmelidir.
### 6. Git ve Proje Dosyalarına Erişim
Proje dosyalarını kullanabilmek için git kurulumu yapılmalıdır. Ardından home dizini içerisinde yeni bir klasör oluşturulmalıdır. DergiPark dosyaları **Ulakbim Stash** platformunda **master branch** dizininde bulunmaktadır.

  <br/>
  
## 7. DergiPark Konfigürasyon Aşaması
Öncelikle proje dosyaları belirlenen uygun bir klasöre clone edilmelidir.

Clone edilen projenin **app** klasörünün altında **spool** isimli klasör oluşturulmalıdır.
app>config içerisinde **parameters.yml** isminde dosya oluşturulmalıdır.
**app>config>parameters.yml.dist** dosyasındaki tüm alanlar parameters.yml içerisine kopyalanmalıdır.
Parameters.yml içerisine aktarılan parametreler kullanıcıya uygun şekilde ayarlanmalıdır.
Dosya İzinlerini ayarlama veya düzeltme işlemi yapılmalıdır. Bunun için Symfony web sayfasına bakınız.
Ardından başta oluşturulan **spool** klasörüne -R 777 izni verilmelidir.
Aynı şekilde **web** klasörüne de -R 777 izni verilmelidir.

### 7.1. Sistem Hosts Dosya Konfigürasyonu
     Öncelikle /etc/hosts dizinine gidilir.
     Burada localhost IP’sine denk gelen kısma sites-avaliable dosyasıyla aynı olan domain ismi girilmelidir. 
### 7.2. PHP FPM Konfigürasyonu
     /etc/php/7.3/fpm/pool.d/www.conf dosyası açılarak içerisine local IP olan listen=127.0.0.1:9000 komutu dosyanın en sonuna eklenmelidir.

**Not:** FPM socket üzerinden kullanıldığından buna göre konfigüre edilmiştir.

### 7.3. DergiPark Database Restore
Veri tabanı aktarımından önce postgresql üzerinden kullanıcı ve veritabanı oluşturulmalıdır. Burada dikkat edilecek nokta ise db ismi, kullanıcı adı ve şifrenin parameters.yml ile aynı olmasıdır.
DergiPark **.sqlc** uzantılı database dosya çıktısı alındıktan sonra **pg_restore** komutuyla içeri aktarılmalıdır. Aktarım bittiğinde veritabanı izinleri oluşturulan kullanıcıya verilmelidir. Buradaki izinler tüm tablolara ve ayrıca SEQUENCES tablosuna da verilmelidir.
Kullanıcıya tam ayrıcalık verilmelidir.

## 8. DergiPark Local Sistem Çalıştırma
  Proje çalıştırılarak hata kontrolü yapılmalıdır. Şayet hata yoksa DergiPark local ve dergipark.org.tr üzerinden aynı bilgileri içeren bir kullanıcı oluşturulması gerekmektedir. 
## 9. Fosuser Kullanıcı Yetkilendirme
Bu kısımda sistem üzerinden oluşturulan kullanıcıya **fosuser promote** ile **ROLE_SUPER_ADMIN** ve **ROLE_ALLOWED_TO_SWITCH** yetkilerinin atanması gerekmektedir.

**Not:** Şu ana kadar bir sorun olmadıysa ve veri tabanı sorunsuz olarak aktarıldıysa elasticsearch üzerinden verilerin indexlenmesi aşamasına geçebilirsiniz.

## 10. ElasticSearch Veri Index Konfigürasyonu

  Bu kısımda projenin alt dizininde olan **fos_index.sh** adlı bash dosyası çalıştırılarak veriler index sürecine gönderilmelidir.


------

<br/><br/>

 | Servis & Program |  Versiyon  |
 | :----------: | :---------: |
 | symfony  | 2.8.*  |
 | PHP |  7.3 |
 | PHP - FPM  |  7.3 |
 | postgresql |  9.5 |
 | postgresql-contrib | 9.5 |
 | java | jdk-8 |
 | elasticsearch | 2.4.* |
 | friendsofsymfony/elastica-bundle | 4.0.1 |
 | twig/extensions | 1.4.1|
 | symfony/swiftmailer-bundle| 2.4.2|
 | symfony/assetic-bundle | 2.8.1 |
 | symfony/monolog-bundle | 2.12.1 |
 | doctrine/doctrine-migrations-bundle | ^1.3 |
 | doctrine/migrations | ^1.5 | 
 | doctrine/dbal | 2.5.10 |
 | doctrine/doctrine-bundle | 1.6.7 | 
 | doctrine/orm | 2.5.6|
 | sentry/sentry-symfony | ^1.0 |
 | guzzlehttp/guzzle | 6.2.2 |
 | friendsofsymfony/user-bundle | 2.0.0 |
 | doctrine/doctrine-fixtures-bundle | 2.3.0 |
 | sensio/generator-bundle | 3.1.2 |
 | sensio/distribution-bundle | 5.0.18 |

<br><br>

 © 2021 - Yonca Teknoloji Mühendislik ve Elektronik Hizmetleri Ltd. Şti.
