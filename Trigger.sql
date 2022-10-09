-----------Trigger Tính Tổng Tiền Trong Kho Hàng----------
CREATE TRIGGER TinhTien ON khohang FOR INSERT
As
Begin
	declare @id int,@sl int,@giasanpham decimal
	select @id=id,@sl=soluong,@giasanpham=giasanpham from inserted 
	update khohang set tongtienkho=@sl*@giasanpham where id=@id
End
Go
CREATE TRIGGER TinhTien_Sua ON khohang FOR Update
As
Begin
	declare @id int,@sl_tr int,@sl_sau int,@gia_truoc decimal,@gia_sau decimal
	select @id=id,@sl_sau=soluong,@gia_sau=giasanpham from inserted 
	select @gia_truoc=giasanpham,@sl_tr=soluong from deleted
	update khohang set tongtienkho=tongtienkho-(@sl_tr*@gia_truoc) +(@sl_sau*@gia_sau) where id=@id
End
-----------Trigger Xuất Kho Và Trừ Số Lượng Kho Cho Menu----------
CREATE TRIGGER XuatKho ON chitietkho FOR INSERT
As
Begin
	declare @id int,@sl int
	select @id=khohang_id,@sl=soluong from inserted 
	update khohang set soluong=soluong-@sl where id=@id
End
Go
CREATE TRIGGER XuatKho_Sua ON chitietkho FOR Update
As
Begin
	declare @id int,@sl_truoc int,@sl_sau int
	select @id=khohang_id,@sl_sau=soluong from inserted 
	select @sl_truoc = soluong from deleted
	update khohang set soluong=soluong+ @sl_truoc -@sl_sau where id=@id
End
Go
CREATE TRIGGER XuatKho_Xoa ON chitietkho FOR Delete
As
Begin
	declare @id int,@sl_sau int
	select @id=khohang_id,@sl_sau=soluong from deleted 
	update khohang set soluong=soluong+ @sl_sau where id=@id
End
Go
CREATE TRIGGER GiatienAndSL ON chitietkho FOR INSERT
As
Begin
	declare @id int,@gianhap decimal,@sl int
	select @id=menu_id,@gianhap=gianhap,@sl=soluong from inserted 
	update menu set giaold=giaold+@gianhap where id=@id
	update menu set gianew=gianew+@gianhap where id=@id
	update menu set soluong=soluong +@sl where id=@id
End
Go
CREATE TRIGGER GiatienAndSL_Sua ON chitietkho FOR Update
As
Begin
	declare @id int,@gia_truoc decimal,@gia_sau decimal,@sl_truoc int,@sl_sau int
	select @id=menu_id,@gia_sau=gianhap,@sl_sau=soluong from inserted 
	select @gia_truoc = gianhap,@sl_truoc=soluong from deleted
	update menu set giaold=giaold-@gia_truoc +@gia_sau where id=@id
	update menu set gianew=gianew-@gia_truoc +@gia_sau where id=@id
	update menu set soluong=soluong-@sl_truoc + @sl_sau where id=@id
End
Go
CREATE TRIGGER GiatienAndSL_Xoa ON chitietkho FOR Delete
As
Begin
	declare @id int,@gianhap decimal,@sl int
	select @id=menu_id,@gianhap=gianhap,@sl=soluong from deleted 
	update menu set giaold=giaold-@gianhap where id=@id
	update menu set gianew=gianew-@gianhap where id=@id
	update menu set soluong=soluong -@sl where id=@id
End

-----------Trigger Giảm Giá Cho Menu----------
CREATE TRIGGER GiamGia_Them ON giamgia FOR INSERT
As
Begin
	declare @id int,@sale int
	select @id=menu_id,@sale=phantram from inserted 
	update menu set gianew=gianew*((100-@sale)*0.01) where  id=@id
End
Go
CREATE TRIGGER GiamGia_Sua ON giamgia FOR Update
As
Begin
	declare @id int,@sale_truoc int,@sale_sau int
	select @id=menu_id,@sale_sau=phantram from inserted 
	select @sale_truoc = phantram from deleted
	update menu set gianew=gianew/((100-@sale_truoc)*0.01)*((100-@sale_sau)*0.01) where id=@id
End
Go
CREATE TRIGGER GiamGia_Xoa ON giamgia FOR delete
As
Begin
	declare @id int,@sale_sau int
	select @id=menu_id,@sale_sau=phantram from deleted 
	update menu set gianew=gianew/((100-@sale_sau)*0.01) where id=@id
End
-----------Trigger Xuất Menu cho Đơn Hàng----------
CREATE TRIGGER XuatMenu ON chitietdathang FOR INSERT
As
Begin
	declare @id int,@sl int
	select @id=menu_id,@sl=soluong from inserted 
	update menu set soluong=soluong-@sl where id=@id
End
Go
CREATE TRIGGER XuatMenu_Sua ON chitietdathang FOR Update
As
Begin
	declare @id int,@sl_truoc int,@sl_sau int
	select @id=menu_id,@sl_sau=soluong from inserted 
	select @sl_truoc = soluong from deleted
	update menu set soluong=soluong+ @sl_truoc -@sl_sau where id=@id
End
Go
CREATE TRIGGER XuatMenu_Xoa ON chitietdathang FOR Delete
As
Begin
	declare @id int,@sl_sau int
	select @id=menu_id,@sl_sau=soluong from deleted 
	update menu set soluong=soluong+ @sl_sau where id=@id
End

-----------Trigger Giá Menu cho Chi Tiết Đơn Hàng----------

CREATE TRIGGER ThemChiTietDonHang ON chitietdathang FOR INSERT
AS
BEGIN
	DECLARE @SoLuongSP INT = 0
	DECLARE @MaMenu int
	DECLARE @SLC INT
	DECLARE @MaDH int
	SELECT @SLC=soluong FROM menu
	SELECT @MaMenu=menu_id,@MaDH=order_id,@SoLuongSP=soluong FROM INSERTED
	DECLARE @GiaMenu decimal(18, 0)
	SELECT @GiaMenu=gianew FROM menu WHERE id = @MaMenu
	UPDATE chitietdathang SET tongtien=@SoLuongSP*@GiaMenu WHERE order_id = @MaDH AND menu_id=@MaMenu
	UPDATE donhang SET tongtien=tongtien+@SoLuongSP*@GiaMenu WHERE id = @MaDH
END
Go
CREATE TRIGGER CapNhatChiTietDH ON chitietdathang FOR UPDATE
AS
BEGIN
	DECLARE @SoLuongCu INT
	DECLARE @SoLuongMoi INT
	DECLARE @MaSP int
	DECLARE @SoLuongChenhLech INT
	DECLARE @MaDH int
	DECLARE @ThanhTien decimal(18, 0)
	SELECT @SoLuongCu = soluong,@MaDH = order_id,@MaSP = menu_id,@ThanhTien = tongtien FROM DELETED
	SELECT @MaSP=menu_id FROM DELETED
	DECLARE @GiaSP decimal(18, 0)
	SELECT @SoLuongMoi = soluong FROM INSERTED
	SET @SoLuongChenhLech =  @SoLuongCu - @SoLuongMoi
	SELECT @SoLuongMoi = SoLuong FROM INSERTED
	SELECT @GiaSP=gianew FROM menu WHERE id = @MaSP
	UPDATE chitietdathang SET tongtien= tongtien - @SoLuongChenhLech*@GiaSP WHERE order_id = @MaDH AND menu_id=@MaSP
	UPDATE donhang SET tongtien=tongtien - (@SoLuongChenhLech*@GiaSP) WHERE id = @MaDH
END

SELECT SUM(tongtien) FROM chitietdathang WHERE order_id=1;