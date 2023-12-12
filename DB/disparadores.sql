use comunidadweb;
Create table RUsuario(
	ID int,
    Correo text,
    Nombre text,
    Apellido text,
    contrasena text,
    horario datetime
);
CREATE TRIGGER registrodeusuarios AFTER INSERT ON usuario FOR EACH ROW INSERT INTO RUsuario (ID, Correo, Nombre, Apellido, contrasena,horario) VALUES (NEW.ID_Usuario, NEW.Correo, NEW.Nombre_Usuario, NEW.ApellidoP, NEW.contrasena,NOW() );
Create table BorradoMunicipio(
    ID int,
    Nombre text,
    horario datetime
);
CREATE TRIGGER borrarmunicipio BEFORE DELETE ON Municipio FOR EACH ROW INSERT INTO registrodeusuarios(ID,Nombre,horario) VALUES (OLD.ID_Municipio,OLD.Nombre_Municipio,NOW());