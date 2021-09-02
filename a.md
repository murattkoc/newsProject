# DergiPark Kurulum ve Temel Gereksinim Kılavuzu

Öncelikle bu doküman, dergipark sistemini sıfırdan kuranlar için sistem gereksinimlerinin, kurulacak programların ve gerekli tüm ayarların yapılması amacıyla oluşturulmuştur.

------
[![N|Solid](https://www.ankarateknokent.com/wp-content/uploads/2019/07/Yonca-Teknoloji-Logo.png)](https://nodesource.com/products/nsolid)
tarafından hazırlanmıştır. 

------
  <br/><br/>
# Dokümantasyon
Bu doküman dergipark kurulumu ve gerekli konfigürasyonları yapmak amacıyla oluşturulmuştur.Bu kısımda kurulan programlara ve servislere ait olan kaynak dokümanlar yer almaktadır. 

**Not:** Bu doküman kapsamında yapılan tüm işlemlerin sürümleri birbirleriyle aynı olmalıdır.

### Kurulum

DergiPark için Symfony 2.8.* sürümü gerekmektedir.
#### 1. Nginx Server Kurulumu 
    Nginx 1.10.* versiyonu seçilmelidir.
### 2. PHP ve PHP-FPM Kurulumu
     PHP 7.3 ve PHP-FPM 7.3 versiyonu seçilmelidir.
### 3. Postgresql ve Postgresql-contrib Kurulumu
    Postgresql 9.5 versiyonu seçilmelidir.
    Postgresql-contrib-9.5 versiyonu seçilmelidir.
### 4. ElasticSearch Kurulumu
     Elasticsearch 2.4.4 versiyonu seçilmelidir.
     apt-transport-https yüklemesi de yapılmalıdır.
     Elasticsearch sistemi türkçe dil desteği için icu plugin eklentisi yüklenmelidir.
     Bilgisayar açıldığında elasticsearch’ ün otomatik olarak koşması için daemon ayarı yapılmalıdır.
    /usr/share/elasticsearch dizinine 777 izinleri tanımlanmalıdır.
    /usr/share/elasticsearch/config dizinine 777 izinleri tanımlanmalıdır.
    ln -s /etc/elasticsearch/ /usr/share/elasticsearch/config sembolik link verilmelidir.
    İşlemler sonunda servisin durumu kontrol edilmelidir.

### 5. PHP Gerekli Extension Kurulumu
    a. php7.3-apcu
    b. php7.3-apcu-bc 
    c. php7.3-memcached 
    d. php7.3-xdebug
    e. php7.3-xml
    d. php7.3-curl
    e. Php7.3-gd
    f. Php-7.3-pgsql
### 6. Java Jdk-8 Kurulumu ve Konfigürasyonu
     Java  openjdk-8-jdk yüklenmelidir.
     JAVA_HOME path ayarlaması ve  PATH değişkenine JAVA bin dizin eklemesi Yapılmalıdır.
     İşlemler sonunda java versiyonu kontrol edilmelidir.
### 7. Git Kurulumu
    Proje dosyalarını kullanabilmek için git kurulumu yapılmalıdır. Ardından home dizini içerisinde yeni bir klasör oluşturulmalıdır.
    Daha sonra  https://git.ytlabs.com/ reposuna kullanıcı kaydınız yapılmalıdır.(Bu kayıt DergiPark dosyalarını clone edebilmek için gereklidir.)
    Kayıt olunduktan ve proje dosyalarına eriştikten sonra proje url üzerinden clone edilmelidir. 
    Daha sonra oluşturulan yeni klasöre geçip içerisinde proje dosyaları github kullanıcı adı ve şifresiyle clone edilmelidir.  
### 8. PhpStorm IDE Kurulumu( İsteğe Bağlı)
    Tercihen istenilen ide üzerinde çalışılabilir. Bu sistem için PhpStorm önerilmektedir. 
    PhpStorm ide programını Ubuntu Software üzerinden yüklenebilir. 
    30 günlük deneme sürümü veya var ise lisans üzerinden kayıt olunmalıdır. 
    Kayıt olduktan sonra projeyi artık kullanabilirsiniz.

**Not:** PhpStorm üzerinden symfony projelerini kolay kullanabilmek için bazı pluginlerin yüklenmesi önerilmektedir. Bunlardan birkaçı; 

