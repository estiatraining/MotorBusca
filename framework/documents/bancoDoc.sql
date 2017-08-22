/*==============================================================*/
/* Database name:  PHYSICALDATAMODEL_1                          */
/* DBMS name:      PostgreSQL 7                                 */
/* Created on:     14/8/2009 14:55:23                           */
/*==============================================================*/


drop table PAGINAS;

/*==============================================================*/
/* Table: PAGINAS                                               */
/*==============================================================*/
create table PAGINAS (
PAG_ID               SERIAL               not null,
PAG_LINK             VARCHAR(200)         not null,
PAG_CONTEUDO         TEXT                 not null,
PAG_DATA             DATE                 not null,
PAG_HORA             TIME                 not null,
constraint PK_PAGINAS primary key (PAG_ID)
);

comment on table PAGINAS is
'cadastro de paginas web.';

