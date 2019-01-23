CREATE TABLE funcionario(
RUN varchar(12) primary key not null,
nombre varchar(30) not null,
contraseña varchar(30) not null,
permiso integer not null,
carrera integer,
programa integer
)

CREATE TABLE carrera(
nom_carrera varchar(40) not null,
cod_carrera integer primary key not null
)

CREATE TABLE estudiante(
RUN varchar(12) primary key not null,
nombre varchar(30) not null,
cod_carrera integer not null,
correo varchar(30) not null,
nivel varchar(15) not null,
telefono varchar(12) not null,
pace char not null
)

CREATE TABLE derivacion(
cod_derivacion serial unique primary key not null,
cod_programa integer not null,
RUN_Estudiante varchar(12) not null,
RUN_Funcionario_Deriv varchar(12) not null,
fecha_hora_deriv datetime not null,
fecha_hora_prog datetime not null,
fecha_hora_realizada datetime not null,
estado char not null,
tipo_apoyo varchar(30)
)

CREATE TABLE programa(
nom_prog varchar(40) not null,
cod_programa integer primary key not null
)

CREATE TABLE masterkey(
RUT varchar(12) primary key not null,
contraseña varchar(30) not null
)