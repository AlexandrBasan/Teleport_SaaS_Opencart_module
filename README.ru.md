Courier Shipping (with TEXT instead the price)
==============================================

Методы доставки с произвольным текстом (и ссылками на калькуляторы перевозчиков) вместо цены
============================================================================================

Author:   | <http://rb.labtodo.com/>  
Date:     | 2012-02-25  
Modified: | 2013-05-27


DESCRIPTION
-----------

Существует много служб-перевозчиков, которые имеют свои сложные калькуляторы на собственных сайтах.
Воспроизвести их или пытаться выдать покупателю приблизительную сумму часто неудобно и цена доставки
согласовывается при обработке заказа.

Для таких случаев удобно разместить в способах доставки метод, у которого не указана цена, зато есть
ссылки на несколько возможных служб-перевозчиков.

AS IS. Тексты редактируются в языковых файлах и не вынесены в админ часть.

  * `courier_ua/admin/language/english/shipping/courier_ua.php`
  * `courier_ua/catalog/language/english/shipping/courier_ua.php`
  * аналогично для `_russia` и остальных вариантов

Цена редактируется в строке #24 файла

  * `catalog/model/shipping/courier_russia.php` (`courier_ua.php`)


В архиве - 10 модулей (`courier_ua`, `courier_russia` и ещё 2x4 вариантов для 4 основных украинских служб доставки)
с разными кодами. Их можно произвольно переименовывать (см. языковые файлы) и использовать для любых стран
и потребностей. Все модули могут использоваться одновременно (поскольку коды у них разные).


DOWNLOADS
---------

  * <http://www.opencart.com/index.php?route=extension/extension/info&extension_id=5158&filter_username=rb>
  * <http://rb.labtodo.com/uploads/opencart15/15x-courier-shipping-with-text-not-price.zip>
  * <http://rb.labtodo.com/shop/opencart/15x-shipping-text-not-price>

