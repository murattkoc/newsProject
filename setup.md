# DergiPark Kurulum ve Temel Gereksinim Kılavuzu

Öncelikle bu doküman, DergiPark sistemini sıfırdan kuranlar için sistem gereksinimlerinin, kurulacak programların ve gerekli tüm ayarların yapılması amacıyla oluşturulmuştur.

------
[![N|Solid](https://www.ankarateknokent.com/wp-content/uploads/2019/07/Yonca-Teknoloji-Logo.png)](https://nodesource.com/products/nsolid)
tarafından hazırlanmıştır. 

------
**Version 1**
<br>
# Dokümantasyon
Bu doküman DergiPark kurulumu ve gerekli konfigürasyonları yapmak amacıyla oluşturulmuştur.Bu kısımda kurulan programlara ve servislere ait olan kaynak dokümanlar yer almaktadır. 

**Not:** Bu doküman kapsamında yapılan tüm işlemlerin sürümleri birbirleriyle aynı olmalıdır.

### Kurulum

DergiPark için Symfony 2.8.* sürümü gerekmektedir.

### 1. PHP ve PHP-FPM Kurulumu
     PHP 7.3 ve PHP-FPM 7.3 versiyonu seçilmelidir.
### 2. Postgresql ve Postgresql-contrib Kurulumu
    Postgresql-9.5 versiyonu seçilmelidir.
    Postgresql-contrib-9.5 versiyonu seçilmelidir.
### 3. ElasticSearch Kurulumu
     Elasticsearch 2.4.4 versiyonu seçilmelidir.
     apt-transport-https yüklemesi de yapılmalıdır.
     Elasticsearch sistemi türkçe dil desteği için icu plugin eklentisi yüklenmelidir.
     Bilgisayar açıldığında elasticsearch’ ün otomatik olarak koşması için daemon ayarı yapılmalıdır.
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
     Java  openjdk-8-jdk yüklenmelidir.
     JAVA_HOME path ayarlaması ve  PATH değişkenine JAVA bin dizin eklemesi yapılmalıdır.
     İşlemler sonunda java versiyonu kontrol edilmelidir.
### 6. Git ve Proje Dosyalarına Erişim
Proje dosyalarını kullanabilmek için git kurulumu yapılmalıdır. Ardından home dizini içerisinde yeni bir klasör oluşturulmalıdır. DergiPark dosyaları Ulakbim Stash platformunda master branch dizininde bulunmaktadır.

  <br/>
  
## 7. DergiPark Konfigürasyon Aşaması
Öncelikle proje dosyaları belirlenen uygun bir klasöre clone edilmelidir.

Clone edilen projenin **app** klasörünün altında **spool** isimli klasör oluşturulmalıdır.
app>config içerisinde **parameters.yml** isminde dosya oluşturulmalıdır.
**app>config>parameters.yml.dist** dosyasındaki tüm alanlar parameters.yml içerisine kopyalanmalıdır.
Parameters.yml içerisine aktarılan parametreler kullanıcıya uygun şekilde ayarlanmalıdır.
Dosya İzinlerini Ayarlama veya Düzeltme yapılmalıdır. Bunun için Symfony web sayfasına bakınız.
 Ardından başta oluşturulan spool klasörüne -R 777 izni verilmelidir.
Aynı şekilde web klasörüne de -R 777 izni verilmelidir.

### 7.1. Sistem Hosts Dosya Konfigürasyonu
     Öncelikle /etc/hosts dizinine gidilir.
     Burada localhost IP’sine denk gelen kısma sites-avaliable dosyasıyla aynı olan domain ismi girilmelidir. 
### 7.2. PHP FPM Konfigürasyonu
     /etc/php/7.3/fpm/pool.d/www.conf dosyası açılarak içerisine local IP olan listen=127.0.0.1:9000 komutu dosyanın en sonuna eklenmelidir.

**Not:** Nginx ve FPM socket üzerinden kullanıldığından buna göre konfigüre edilmiştir.

### 7.3. DergiPark Database Restore
 Veri tabanı aktarımından önce postgresql üzerinden kullanıcı ve veritabanı oluşturulmalıdır. Burada dikkat edilecek nokta ise db ismi, kullanıcı adı ve şifrenin parameters.yml ile aynı olmasıdır.
Dergipark **.sqlc** uzantılı database dosyası alındıktan sonra **pg_restore** komutuyla içeri aktarılmalıdır. Aktarım bittiğinde veritabanı izinleri oluşturulan kullanıcıya verilmelidir. Buradaki izinler tüm tablolara ve ayrıca SEQUENCES tablosuna verilmelidir.
Kullanıcıya tam ayrıcalık verilmelidir.

## 8. DergiPark Local Sistem Çalıştırma
  Proje nginx server üzerinden çalıştırılarak hata kontrolü yapılmalıdır. Şayet hata yoksa DergiPark local ve dergipark.org üzerinden aynı bilgileri içeren bir kullanıcı oluşturulması gerekmektedir. 
## 9. Fosuser Kullanıcı Yetkilendirme
Bu kısımda sistem üzerinden oluşturulan kullanıcıya **fosuser promote** ile **ROLE_SUPER_ADMIN** ve **ROLE_ALLOWED_TO_SWITCH** yetkilerinin atanması gerekmektedir.

**Not:** Şu ana kadar bir sorun olmadıysa ve veri tabanını sorunsuz olarak aktarıldıysa elasticsearch üzerinden verilerin indexlenmesi aşamasına geçebilirsiniz.

## 10. ElasticSearch Veri Index Konfigürasyonu

  Bu kısımda projenin alt dizininde olan **fos_index.sh** adlı bash dosyası çalıştırılarak veriler index sürecine aktarılmalıdır.


------
<br/><br/>
 | Servis & Program | Gerekli Versiyon  |
 | :----------: | :---------: |
 | Symfony  | 2.8.*  |
 |  PHP |  7.3 |
 | PHP - FPM  |  7.3 |
 |Postgresql|  9.5 |
 | Postgresql-contrib| 9.5|
 | Java|jdk-8 |
 |Elasticsearch| 2.4.*|

<br><br>

 © 2021 - Yonca Teknoloji Mühendislik ve Elektronik Hizmetleri Ltd. Şti.
