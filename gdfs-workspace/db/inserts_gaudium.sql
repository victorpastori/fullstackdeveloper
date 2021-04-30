use gdfs;

insert into cidades (nome) 
values 
('Paraná'),
('Rio de Janeiro'),
('Salvador'),
('São Paulo');

insert into categorias (nome) 
values 
('Mototaxi'),
('Carro Executivo'),
('Carro de Luxo'),
('Carro de Carga');

insert into cidade_has_categorias (cidade_id, categoria_id, bandeirada, valor_hora, valor_km) 
values 
(2, 1, 250, 950, 130),
(3, 1, 270, 1000, 130),
(3, 2, 420, 1200, 180),
(3, 3, 450, 1300, 200),
(4, 1, 300, 1000, 150),
(4, 2, 450, 1300, 200),
(4, 3, 480, 1300, 210),
(4, 4, 550, 1400, 250);

