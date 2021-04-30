use gdfs;

create table cidades (
	id int not null auto_increment,
    nome varchar(255) not null,
    PRIMARY KEY (id)
);

create table categorias (
	id int not null auto_increment,
    nome varchar(255) not null,
    PRIMARY KEY (id)
);

create table cidade_has_categorias (
	id int not null auto_increment,
    cidade_id int not null,
    categoria_id int not null,
    bandeirada double not null,
    valor_hora double not null,
    valor_km double not null,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id),
    FOREIGN KEY (cidade_id) REFERENCES cidades(id),
    PRIMARY KEY (id)
);

create table historico_calculos (
	id int not null auto_increment,
    endereco_origem varchar(1000) not null,
    endereco_destino varchar(1000) not null,
    duracao double not null,
    valor double not null,
    cidade_id int not null,
    categoria_id int not null,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id),
    FOREIGN KEY (cidade_id) REFERENCES cidades(id),
    PRIMARY KEY (id)
);

