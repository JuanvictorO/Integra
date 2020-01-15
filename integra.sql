
create schema integra default charset utf8;
use integra;
create table farmacia(
id_farmacia int not null auto_increment primary key,
nome_farmacia varchar(50) not null,
email varchar(80) not null unique,
telefone varchar(20) not null,
cpf_cnpj varchar(18) not null,
crj varchar(5) not null,
estado varchar(2) not null,
cidade varchar(30) not null,
endereco varchar(300),
senha varchar(100) not null/* CUIDADO AQUI QUE PODE TER ERRO COM A CRIPTOGRAFIA E O ESPAÇAMENTO DELA */
)engine=InnoDB default charset=utf8;


create table produto(
	id_produto int not null auto_increment primary key,
    id_farmacia_produto int not null,
    nome_produto varchar(50) not null,
    data_fabricacao date not null,
    data_validade date not null,
    situacao varchar(5) not null,
    preco_pago decimal(10,2) not null,
    preco_venda decimal(10,2) not null,
    foreign key(id_farmacia_produto) references farmacia(id_farmacia)
)engine=InnoDB default charset=utf8; 
create table catalogo(
	id_catalogo int not null auto_increment primary key,
    id_produto int not null,
    id_farmacia int not null,
    foreign key(id_produto) references produto(id_produto),
    foreign key(id_farmacia) references farmacia(id_farmacia)
)engine = InnoDB default charset=utf8;
create table entrada(
	id_entrada int not null auto_increment primary key,
    id_produto int not null,
    id_farmacia int not null,
    qtd int,
    foreign key(id_produto) references produto(id_produto),
    foreign key(id_farmacia) references farmacia(id_farmacia)
)engine=InnoDB default charset=utf8;

create table saida(
	id_saida int not null auto_increment primary key,
    id_produto int not null,
    id_farmacia int not null,
    qtd int,
    foreign key(id_produto) references produto(id_produto),
    foreign key(id_farmacia) references farmacia(id_farmacia)
)engine=InnoDB default charset=utf8;
create table estoque(
	id_produto int not null,
    id_farmacia int not null,
    qtd int,
    primary key(id_produto,id_farmacia),
    foreign key(id_produto) references produto(id_produto),
    foreign key(id_farmacia) references farmacia(id_farmacia)
)engine=InnoDB default charset=utf8;

DELIMITER $



CREATE TRIGGER tgr_entrada_insert
AFTER INSERT ON entrada
FOR EACH ROW
BEGIN

	INSERT IGNORE INTO estoque(id_produto, id_farmacia, qtd) values(NEW.id_produto, NEW.id_farmacia, 0);
	
    UPDATE estoque SET qtd = qtd+NEW.qtd WHERE id_produto = NEW.id_produto AND id_farmacia = NEW.id_farmacia;
	
END $

CREATE TRIGGER tgr_entrada_delete
AFTER DELETE ON entrada
FOR EACH ROW
BEGIN
	
    UPDATE estoque SET qtd = qtd - OLD.qtd WHERE id_produto = OLD.id_produto AND id_farmacia = OLD.id_farmacia;
	
END $

CREATE TRIGGER tgr_saida_delete
AFTER DELETE ON saida
FOR EACH ROW
BEGIN
	
    UPDATE estoque SET qtd = qtd+OLD.qtd WHERE id_produto = OLD.id_produto AND id_farmacia = OLD.id_farmacia;
	
END $

CREATE TRIGGER tgr_saida_insert
AFTER INSERT ON saida
FOR EACH ROW
BEGIN
	
    UPDATE estoque SET qtd = qtd-NEW.qtd WHERE id_produto = NEW.id_produto AND id_farmacia = NEW.id_farmacia;
	
END $

DELIMITER ;

