CREATE DATABASE sipedb;	
\c sipedb

CREATE TABLE disciplina (
	codigo INTEGER NOT NULL,
	nome VARCHAR(60) NOT NULL,
	ch INTEGER NOT NULL,
	ementa VARCHAR(2000) NOT NULL,
	objetivo VARCHAR(2000) NOT NULL,
	bibliografia_basica VARCHAR(2000) NOT NULL,
	bibliografia_complementar VARCHAR(2000) NOT NULL,
		constraint pkDisciplina primary key (codigo) );

CREATE TABLE planejamento (
	id serial NOT NULL,
	ano INTEGER NOT NULL,
	semestre INTEGER NOT NULL,
	data_inicio DATE NOT NULL,
	data_termino DATE,
	situacao CHAR(1) NOT NULL,
		constraint pkPlanejamento primary key (id) );

CREATE TABLE usuario (
	id serial NOT NULL,
	login VARCHAR(20) NOT NULL,
	senha VARCHAR(50) NOT NULL,
	nome VARCHAR(60) NOT NULL,
	sexo CHAR(1) NOT NULL,
	nivel CHAR(1) NOT NULL,
		constraint pkUsuario primary key (id) );

CREATE TABLE professor (
	matricula INTEGER NOT NULL,
	nome VARCHAR(60) NOT NULL,
	cep INTEGER NOT NULL,
	logadouro VARCHAR(100) NOT NULL,
	numero VARCHAR(15) NOT NULL,
	complemento VARCHAR,
	bairro VARCHAR(40) NOT NULL,
	cidade VARCHAR(35) NOT NULL,
	uf CHAR(2) NOT NULL,
	id INTEGER NOT NULL,
			constraint pkProfessor primary key (matricula),
			constraint fkProfessor foreign key (id)
				references usuario(id) );

CREATE TABLE curso (
	numero INTEGER NOT NULL,
	nome VARCHAR(80) NOT NULL,
	sigla VARCHAR(4) NOT NULL,
	tipo CHAR(1) NOT NULL,
	matricula INTEGER NOT NULL,
			constraint pkCurso primary key (numero),
			constraint fkCurso foreign key (matricula)
				references professor(matricula) );				

CREATE TABLE curso_disciplina (
	numero INTEGER NOT NULL,
	codigo INTEGER NOT NULL,
	modulo CHAR(1) NOT NULL,
			constraint pk_curso_disciplina primary key(numero,codigo),
			constraint fkcurso_disciplina_curso foreign key (numero)
				references curso (numero),
			constraint fkCurso_disciplina foreign key (codigo)
				references disciplina (codigo) );
				
CREATE TABLE planejamento_curso (
	numero INTEGER NOT NULL,
	id INTEGER NOT NULL,
			constraint pk_planejamento_curso primary key(id,numero),
			constraint fkPlanejamento_curso_planejamento foreign key (id)
				references planejamento (id) ,
			constraint fkPlanejamento_curso foreign key (numero)
				references curso (numero) );				
				
CREATE TABLE planoensino (
	codigo 	serial NOT NULL,
	competencia VARCHAR(2000) NOT NULL,
	conteudo_programatico VARCHAR(4000) NOT NULL,
	recurso_metodologico VARCHAR(400) NOT NULL,
	criterio_avaliacao VARCHAR(2000) NOT NULL,
	instrumento_avaliacao VARCHAR(2000)  NOT NULL,
	AEC VARCHAR(4000) NOT NULL,
	bibliografia_sugerida VARCHAR(1000),
	situacao CHAR(1) NOT NULL,
	obs_devolucao  VARCHAR(1000) NOT NULL,
	data_aprovacao DATE,
	id INTEGER NOT NULL,
	codigo_disc INTEGER NOT NULL,
	matricula_professor integer NOT NULL,
	matricula_coordenador integer NOT NULL,
			constraint pkPlanoensino primary key (codigo),
			constraint fkPlanoensino_planejamento foreign key (id)
				references planejamento(id), 
			constraint fkPlanoensino_disciplina foreign key (codigo_disc)
				references disciplina(codigo),				
			constraint fkPlanoensino_professor foreign key (matricula_professor)
				references professor(matricula),				
			constraint fkPlanoensino foreign key (matricula_coordenador)
				references professor(matricula) );
