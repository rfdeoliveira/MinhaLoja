create table produtos (
  id integer auto_increment primary key,
  nome varchar (255),
  preco decimal (10, 2),
  descricao text,
  categoria_id integer,
  usado boolean default false
);
