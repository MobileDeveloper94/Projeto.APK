create table if not exists Usuario(
	usuario_id int not null AUTO_INCREMENT unique,
    usuario_nome varchar(255) not null,
    usuario_email varchar(255) not null unique,
    usuario_ativo boolean default true,
    usuario_senha varchar(255) not null,
    usuario_cpf varchar(11),
    usuario_telefone varchar(20),
    CONSTRAINT pk_usuario primary key(usuario_id)
)