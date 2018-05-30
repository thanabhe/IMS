CREATE TRIGGER `TG_StockUpdate_Pengiriman` AFTER INSERT ON `detailpengiriman`
 FOR EACH ROW BEGIN
 UPDATE tblbarang SET stock=stock-NEW.qty
 WHERE matnr=NEW.matnr;
END