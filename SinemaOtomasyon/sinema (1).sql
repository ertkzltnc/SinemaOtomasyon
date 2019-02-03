-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 Ara 2017, 09:43:12
-- Sunucu sürümü: 5.7.14
-- PHP Sürümü: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sinema`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bilet`
--

CREATE TABLE `bilet` (
  `bilet_id` int(11) NOT NULL,
  `bilet_turu` text COLLATE utf8_turkish_ci NOT NULL,
  `fiyat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `bilet`
--

INSERT INTO `bilet` (`bilet_id`, `bilet_turu`, `fiyat`) VALUES
(1, 'Normal', 100),
(2, 'Ã–ÄŸrenci', 50);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `filmler`
--

CREATE TABLE `filmler` (
  `film_id` int(11) NOT NULL,
  `film_adi` text COLLATE utf8_turkish_ci NOT NULL,
  `yil` int(11) NOT NULL,
  `aktor` text COLLATE utf8_turkish_ci NOT NULL,
  `aktris` text COLLATE utf8_turkish_ci NOT NULL,
  `yonetmen` text COLLATE utf8_turkish_ci NOT NULL,
  `dil` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `sure` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `filmler`
--

INSERT INTO `filmler` (`film_id`, `film_adi`, `yil`, `aktor`, `aktris`, `yonetmen`, `dil`, `sure`) VALUES
(1, 'Deneme Filmm', 2012, 'ErtuÄŸrul', 'Vehbi', 'Vehbi', 'TR', 120);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gosterim`
--

CREATE TABLE `gosterim` (
  `gosterim_id` int(11) NOT NULL,
  `salon_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `tarih` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gosterim`
--

INSERT INTO `gosterim` (`gosterim_id`, `salon_id`, `film_id`, `tarih`) VALUES
(1, 1, 1, '2017-12-07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `kullanici_id` int(11) NOT NULL,
  `ad_soyad` text COLLATE utf8_turkish_ci NOT NULL,
  `posta` text COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `isAdmin` int(11) NOT NULL,
  `sifre` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kullanici_id`, `ad_soyad`, `posta`, `telefon`, `isAdmin`, `sifre`) VALUES
(1, 'Ertugrul Kiziltunc', 'ert@gmail.com', '1111111', 1, '1234'),
(2, 'Vehbi AkdoÄŸan', 'akdoganvehbi@gmail.com', '1234', 0, '1234');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `salonlar`
--

CREATE TABLE `salonlar` (
  `salon_id` int(11) NOT NULL,
  `sinema_id` int(11) NOT NULL,
  `salon_adi` text COLLATE utf8_turkish_ci NOT NULL,
  `kapasite` int(11) NOT NULL,
  `ses_sistemi` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `salonlar`
--

INSERT INTO `salonlar` (`salon_id`, `sinema_id`, `salon_adi`, `kapasite`, `ses_sistemi`) VALUES
(1, 2, 'Salon 1', 500, '3+5'),
(2, 2, 'Salon 2', 100, '3+5');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satis`
--

CREATE TABLE `satis` (
  `satis_id` int(11) NOT NULL,
  `sinema_id` int(11) NOT NULL,
  `salon_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `tutar` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `satis`
--

INSERT INTO `satis` (`satis_id`, `sinema_id`, `salon_id`, `film_id`, `tutar`, `kullanici_id`) VALUES
(1, 2, 1, 1, 50, 1),
(2, 2, 1, 1, 50, 1),
(3, 2, 1, 1, 100, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinemalar`
--

CREATE TABLE `sinemalar` (
  `sinema_id` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yeri` text COLLATE utf8_turkish_ci NOT NULL,
  `salon_sayisi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sinemalar`
--

INSERT INTO `sinemalar` (`sinema_id`, `adi`, `yeri`, `salon_sayisi`) VALUES
(2, 'Sinema 1', 'Erzurum', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `zaman`
--

CREATE TABLE `zaman` (
  `zaman_id` int(11) NOT NULL,
  `indirim` int(11) NOT NULL,
  `aksam` tinyint(1) NOT NULL,
  `gece` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `zaman`
--

INSERT INTO `zaman` (`zaman_id`, `indirim`, `aksam`, `gece`) VALUES
(2, 50, 1, 1),
(3, 70, 0, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bilet`
--
ALTER TABLE `bilet`
  ADD PRIMARY KEY (`bilet_id`);

--
-- Tablo için indeksler `filmler`
--
ALTER TABLE `filmler`
  ADD PRIMARY KEY (`film_id`);

--
-- Tablo için indeksler `gosterim`
--
ALTER TABLE `gosterim`
  ADD PRIMARY KEY (`gosterim_id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `salonlar`
--
ALTER TABLE `salonlar`
  ADD PRIMARY KEY (`salon_id`);

--
-- Tablo için indeksler `satis`
--
ALTER TABLE `satis`
  ADD PRIMARY KEY (`satis_id`);

--
-- Tablo için indeksler `sinemalar`
--
ALTER TABLE `sinemalar`
  ADD PRIMARY KEY (`sinema_id`);

--
-- Tablo için indeksler `zaman`
--
ALTER TABLE `zaman`
  ADD PRIMARY KEY (`zaman_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bilet`
--
ALTER TABLE `bilet`
  MODIFY `bilet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `filmler`
--
ALTER TABLE `filmler`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `gosterim`
--
ALTER TABLE `gosterim`
  MODIFY `gosterim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `salonlar`
--
ALTER TABLE `salonlar`
  MODIFY `salon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `satis`
--
ALTER TABLE `satis`
  MODIFY `satis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `sinemalar`
--
ALTER TABLE `sinemalar`
  MODIFY `sinema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `zaman`
--
ALTER TABLE `zaman`
  MODIFY `zaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
