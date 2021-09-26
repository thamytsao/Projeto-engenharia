USE teste;

drop table usuario;

create table usuario(
id int not null auto_increment,
usuario varchar(200) unique not null,
senha  varchar(32) not null,
tipo   varchar(1) not null,
 primary key(id)
);
select * from usuario;

insert into usuario (usuario,senha,tipo)value('123',md5('321'),'1');
insert into usuario (usuario,senha,tipo)value('456',md5('654'),'2');
insert into usuario (usuario,senha,tipo)value('789',md5('987'),'3');
insert into usuario (usuario,senha,tipo)value('741',md5('147'),'3');


 create table contato(
idContato int not null auto_increment,
email varchar(200) not null unique,
telefone varchar(30) not null unique,
primary key(idContato)
 );
  create table endereco(
  idEndereco int not null auto_increment,
  bairro varchar(200) not null,
  rua varchar(200) not null,
  numero varchar(20) not null,
  complemento varchar(200) not null,
  primary key(idEndereco)
  ); 
  create table aluno(
  matricula varchar(50) not null,
  nome varchar(200) not null,
  status char not null,
  primary key(matricula)
  );
create table responsavel(
idResponsavel int not null auto_increment,
CPF varchar(15) not null,
responsavel varchar(200) not null,
idContato int not null,
idEndereco int not null,
matricula varchar(50 ) not null,
primary key(idResponsavel),
foreign key(idContato) references contato(idContato),
foreign key(idEndereco) references endereco(idEndereco),
foreign key(matricula) references aluno(matricula)
);

----------------------------------------------------------------------------------------------
  drop table endereco;
  drop table contato;
  drop table responsavel;
  --------------------------------------------------------------------------------------------
  
  select * from responsavel;
  select * from endereco;
  select * from contato;
  select * from aluno;
  select idEndereco from endereco e where bairro='75f' and rua ='$76' and numero = 'f78';
  ---------------------------------------------------------------------------------------------------- 
  insert into aluno(matricula, nome, status)values('123456','wendell ferreria de andrade','P');
  insert into aluno(matricula, nome, status)values('789654','hanna andrade','F');
  insert into aluno(matricula, nome, status)values('614985','jose winicius ferreria de andrade','P');
  insert into aluno(matricula, nome, status)values('872885','Matheus Santos','A');
  insert into aluno(matricula, nome, status)values('981249','Sara Gomes','A');
  insert into aluno(matricula, nome, status)values('194889','Elias Lucena','A');
  
  update aluno set status ='A' where matricula ='614985' ;
    
  
  
  
  select * from responsavel full join contato on responsavel.idContato = contato.idContato;
select cpf, nome, matricula, email, telefone
from
responsavel left join contato
on
responsavel.idContato = contato.idContato;

select cpf CPF, responsavel.nome Responsavel, email Email, telefone Telefone, bairro Bairro, rua Rua, numero Número, aluno.matricula Matrícula, aluno.nome Aluno, status Status
from responsavel 
left join contato on responsavel.idContato = contato.idContato
left join endereco on responsavel.idEndereco = endereco.idEndereco
left join aluno on responsavel.matricula = aluno.matricula;

select cpf CPF,Responsavel, email Email, telefone Telefone, bairro Bairro, rua Rua, numero Número,aluno.matricula Matrícula,nome Aluno, status Status
from responsavel 
left join contato on responsavel.idContato = contato.idContato
left join endereco on responsavel.idEndereco = endereco.idEndereco
left join aluno on responsavel.matricula = aluno.matricula
where aluno.matricula='123456';

select * from responsavel ;

update responsavel set responsavel ='Marcus Viana', matricula ='614985' where idContato='1';

-----------------------------------------------------------------------------------------------------------------------------------------------------

create table estoque(
codigo varchar(6) not null,
descricao varchar(50) not null,
quantidade int not null default 0,
primary key(codigo)
);

select * from estoque;

insert into estoque (codigo,descricao,quantidade)value('15987', 'Sabao',0);
insert into estoque (codigo,descricao,quantidade)value('64898', 'Detergente',0);
insert into estoque (codigo,descricao,quantidade)value('19841', 'Agua',0);
insert into estoque (codigo,descricao,quantidade)value('98496', 'Papel',0);
insert into estoque (codigo,descricao,quantidade)value('95977', 'Alcool',0);
------------------------------------------------------------------------------------------
drop table turma;
drop table turma_aluno;

create table turma(
	idTurma int not null auto_increment,
    dataPl date not null,
    semana1 varchar(1) not null,
    semana2 varchar(1) not null,
    semana3 varchar(1) not null,
    semana4 varchar(1) not null,
    primary key(idTurma)
);

create table turma_aluno(
	idTurmaT int not null,
    aluno varchar(50) not null,
    foreign key (idTurmaT) references turma(idTurma),
    foreign key (aluno) references aluno(matricula)
    );

select * from aluno;

insert into turma(dataPl,semana1,semana2,semana3,semana4)values('2021-10-01','S','N','S','N');
insert into turma(dataPl,semana1,semana2,semana3,semana4)values('2021-10-01','N','S','N','S');

select monthname(dataPl) from turma;
select * from turma;

insert into turma_aluno(idTurmaT, aluno)values(1,123456);
insert into turma_aluno(idTurmaT, aluno)values(1,614985);
insert into turma_aluno(idTurmaT, aluno)values(1,789654);
insert into turma_aluno(idTurmaT, aluno)values(2,872885);
insert into turma_aluno(idTurmaT, aluno)values(2,981249);
insert into turma_aluno(idTurmaT, aluno)values(2,194889);

select * from turma_aluno;

select idTurmaT, aluno, nome,monthname(dataPl) mês, status, semana1,semana2,semana3,semana4
from turma_aluno
left join turma on turma_aluno.idTurmaT = turma.idTurma
left join aluno on turma_aluno.aluno = aluno.matricula ;


Select * from(select idTurmaT, aluno, nome,dataPl, status, semana1,semana2,semana3,semana4
from turma_aluno
left join turma on turma_aluno.idTurmaT = turma.idTurma
left join aluno on turma_aluno.aluno = aluno.matricula) alunoo left join responsavel on alunoo.aluno=responsavel.matricula where CPF='12345678901';


Select idTurmaT, aluno, nome, dataPl, status, semana1, semana2, semana3, semana4 from(select idTurmaT, aluno, nome,dataPl, status, semana1,semana2,semana3,semana4
from turma_aluno
left join turma on turma_aluno.idTurmaT = turma.idTurma
left join aluno on turma_aluno.aluno = aluno.matricula) alunoo left join responsavel on alunoo.aluno=responsavel.matricula where CPF='12345678901';
