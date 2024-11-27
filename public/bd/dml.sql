USE `hallyul` ;

-- Inserir usuários
INSERT INTO `hallyul`.`usuario` (`nome`, `usuario`, `senha`, `cpf`, `email`, `dtnascimento`, `tipo`) VALUES
('Ana Souza', 'anasouza', md5('senha123'), '123.456.789-00', 'ana.souza@email.com', '1995-06-15', 'Collector'),
('Maria Oliveira', 'mariaol', md5('senha456'), '234.567.890-11', 'maria.oliveira@email.com', '1992-09-22', 'GOM'),
('Juliana Santos', 'julianas', md5('senha789'), '345.678.901-22', 'juliana.santos@email.com', '1998-11-03', 'GOMllector'),
('Carla Mendes', 'carlamendes', md5('senha101'), '456.789.012-33', 'carla.mendes@email.com', '2000-01-11', 'Collector');

-- Inserir artistas
INSERT INTO `hallyul`.`artista` (`nome`, `tipo`) VALUES
('Stray Kids', 'Grupo'),
('Red Velvet', 'Grupo'),
('Rosé', 'Solo');

-- Inserir eventos
INSERT INTO `hallyul`.`evento` (`nome`, `tipo`, `idArtista`) VALUES
('Stray Kids World Tour', 'Concerto/Turnê', 1), -- Stray Kids
('Red Velvet Comeback', 'Comeback', 2),         -- Red Velvet
('Rosé New Single Launch', 'Evento Especial', 3); -- Rosé

-- Inserir conjuntos para os eventos
INSERT INTO `hallyul`.`conjunto` (`nome`, `idEvento`) VALUES
('SKZ Concert Set', 1),  -- para Stray Kids
('Red Velvet Set', 2),   -- para Red Velvet
('Rosé Special Set', 3); -- para Rosé

-- Inserindo na tabela tipoItem
INSERT INTO `hallyul`.`tipoItem` (`categoria`) VALUES
  ('Álbum'),
  ('Photocard'),
  ('Poster');

-- Inserindo na tabela artista
INSERT INTO `hallyul`.`artista` (`nome`, `tipo`) VALUES
  ('Stray Kids', 'Grupo'),
  ('Red Velvet', 'Grupo'),
  ('Rosé', 'Solo');

-- Inserindo na tabela evento
INSERT INTO `hallyul`.`evento` (`nome`, `tipo`, `idArtista`) VALUES
  ('Maxident World Tour', 'Concerto/Turnê', 1),  -- Stray Kids
  ('Queendom Comeback', 'Comeback', 2),           -- Red Velvet
  ('R Solo Album Launch', 'Comeback', 3);         -- Rosé

-- Inserindo na tabela conjunto
INSERT INTO `hallyul`.`conjunto` (`nome`, `idEvento`) VALUES
  ('SKZ Maxident 2024', 1),  -- Evento de Stray Kids
  ('Red Velvet Queendom 2024', 2),  -- Evento de Red Velvet
  ('Rosé Solo 2024', 3);  -- Evento de Rosé

-- Inserindo na tabela item
INSERT INTO `hallyul`.`item` (`tipoItem`, `nome`, `descricao`, `idConjunto`) VALUES
  (1, 'Álbum Stray Kids - Maxident', 'Álbum do Stray Kids lançado em 2024', 1),  -- Álbuns do evento de Stray Kids
  (2, 'Photocard Red Velvet - Queendom', 'Photocard da Red Velvet do álbum Queendom', 2),  -- Photocard do evento de Red Velvet
  (3, 'Poster Rosé - R', 'Poster oficial do lançamento de Rosé', 3);  -- Poster do evento de Rosé

-- Inserindo na tabela compra
INSERT INTO `hallyul`.`compra` (`nome`) VALUES
  ('Compra GOM 01'),
  ('Compra Collector 01');

-- Inserindo na tabela compraGOM
INSERT INTO `hallyul`.`compraGOM` (`idCompra`, `idGOM`) VALUES
  (1, 3),
  (2, 4);

-- Inserindo na tabela lote
INSERT INTO `hallyul`.`lote` (`idCompra`, `dtCompra`, `dtPgto`, `pgto`) VALUES
  (1, '2024-10-01', '2024-10-05', 1),
  (2, '2024-11-01', NULL, NULL);

-- Inserindo na tabela itemLote
INSERT INTO `hallyul`.`itemLote` (`idItem`, `idLote`, `disponibilidade`, `status`, `preco`, `idUsuario`) VALUES
  (1, 1, 1, 'Seller', 99.99, 1),  -- Álbum Stray Kids (disponível)
  (2, 1, 0, 'Enviado Brasil', 29.99, 2),  -- Photocard Red Velvet (não disponível)
  (3, 2, 1, 'Enviado Brasil', 19.99, 3);  -- Poster Rosé (disponível)
