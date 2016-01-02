
INSERT INTO Classe(nome) VALUES
	('Mamífero'),
	('Aves'),
	('Répteis');



SELECT @mamfiID := ID
FROM Classe
WHERE nome = 'Mamífero';

INSERT INTO Especie(classe_ID, nome) VALUES
	(@mamfiID, 'Cachorro'),
	(@mamfiID, 'Gato'),
	(@mamfiID, 'Furão'),
	(@mamfiID, 'Mico'),
	(@mamfiID, 'Coelho'),
	(@mamfiID, 'Hamster'),
	(@mamfiID, 'Rato'),
	(@mamfiID, 'Camundongo'),
	(@mamfiID, 'Porco'),
	(@mamfiID, 'Chinchila'),
	(@mamfiID, 'Gerbil'),
	(@mamfiID, 'Esquilo');

SELECT @aveID := ID
FROM Classe
WHERE nome = 'Aves';

INSERT INTO Especie(classe_ID, nome) VALUES
	(@aveID, 'Periquito'),
	(@aveID, 'Canário'),
	(@aveID, 'Caturra'),
	(@aveID, 'Cacatuidae'),
	(@aveID, 'Papagaio'),
	(@aveID, 'Galinha'),
	(@aveID, 'Arara'),
	(@aveID, 'Mandarim'),
	(@aveID, 'Agapornis'),
	(@aveID, 'Tucano'),
	(@aveID, 'Galah'),
	(@aveID, 'Calafate'),
	(@aveID, 'Cardeal'),
	(@aveID, 'Curió');

SELECT @RepID := ID
FROM Classe
WHERE nome = 'Répteis';

INSERT INTO Especie(classe_ID, nome) VALUES
	(@RepID, 'Cágado'),
	(@RepID, 'Tartaruga'),
	(@RepID, 'Jabuti'),
	(@RepID, 'Largato'),
	(@RepID, 'Cobra');



SELECT @CachorroID := ID
FROM Especie
WHERE nome = 'Cachorro';

INSERT INTO Raca(especie_ID, nome) VALUES
	(@CachorroID, 'Cachorro_unknown'),
	(@CachorroID, 'Afghan Hound'),
	(@CachorroID, 'Airedale terrier'),
	(@CachorroID, 'Akita Americano'),
	(@CachorroID, 'Akita Inu'),
	(@CachorroID, 'American Pitbull Terrier'),
	(@CachorroID, 'Basset Hound'),
	(@CachorroID, 'Beagle'),
	(@CachorroID, 'Bichon Frisé'),
	(@CachorroID, 'Boxer'),
	(@CachorroID, 'Bulldog'),
	(@CachorroID, 'Bullmastiff'),
	(@CachorroID, 'Bull Terrier'),
	(@CachorroID, 'Chihuahua'),
	(@CachorroID, 'Chow-Chow'),
	(@CachorroID, 'Cocker Americano'),
	(@CachorroID, 'Cocker Spaniel Inglês'),
	(@CachorroID, 'Collie'),
	(@CachorroID, 'Dálmata'),
	(@CachorroID, 'Dobermann'),
	(@CachorroID, 'Dogue Alemão'),
	(@CachorroID, 'Fila Brasileiro'),
	(@CachorroID, 'Foxhound Inglês'),
	(@CachorroID, 'Fox Terrier Pelo Duro'),
	(@CachorroID, 'Fox Terrier Pelo Liso'),
	(@CachorroID, 'Golden Retriever'),
	(@CachorroID, 'Husky Siberiano'),
	(@CachorroID, 'Retriever do Labrador'),
	(@CachorroID, 'Lhasa Apso'),
	(@CachorroID, 'Lulu da Pomerânia'),
	(@CachorroID, 'Maltês'),
	(@CachorroID, 'Mastiff Inglês'),
	(@CachorroID, 'Mastino Napoletano'),
	(@CachorroID, 'Old English Sheepdog'),
	(@CachorroID, 'Pastor Alemão'),
	(@CachorroID, 'Pequinês'),
	(@CachorroID, 'Perdigueiro Português'),
	(@CachorroID, 'Pinscher'),
	(@CachorroID, 'Pointer Inglês'),
	(@CachorroID, 'Poodle'),
	(@CachorroID, 'Rottweiler'),
	(@CachorroID, 'São Bernardo'),
	(@CachorroID, 'Schnauzer Gigante'),
	(@CachorroID, 'Schnauzer Miniatura'),
	(@CachorroID, 'Schnauzer'),
	(@CachorroID, 'Setter Inglês'),
	(@CachorroID, 'Setter Irlandês'),
	(@CachorroID, 'Shar-Pei'),
	(@CachorroID, 'Shih-Tzu'),
	(@CachorroID, 'Spitz Alemão'),
	(@CachorroID, 'Staffordshire Bull Terrier'),
	(@CachorroID, 'Teckel'),
	(@CachorroID, 'Terrier Brasileiro'),
	(@CachorroID, 'Yorkshire Terrier');

SELECT @GatoID := ID
FROM Especie
WHERE nome = 'Gato';

INSERT INTO Raca(especie_ID, nome) VALUES
	(@GatoID, 'Gato_unknown'),
	(@GatoID, 'Abissínio'),
	(@GatoID, 'American Shorthair'),
	(@GatoID, 'Angorá'),
	(@GatoID, 'Azul Russo'),
	(@GatoID, 'de Bengala'),
	(@GatoID, 'Brazilian Shorthair'),
	(@GatoID, 'British Shorthair'),
	(@GatoID, 'Burmese'),
	(@GatoID, 'Chartreux'),
	(@GatoID, 'Cornish Rex'),
	(@GatoID, 'Raça Devon Rex'),
	(@GatoID, 'Egyptian Mau'),
	(@GatoID, 'European Shorthair'),
	(@GatoID, 'Exótico'),
	(@GatoID, 'Himalaio'),
	(@GatoID, 'Maine Coon'),
	(@GatoID, 'Munchkin'),
	(@GatoID, 'Norueuguês da Floresta'),
	(@GatoID, 'Oriental'),
	(@GatoID, 'Persa'),
	(@GatoID, 'Ragdoll'),
	(@GatoID, 'Sagrado da Birmânia'),
	(@GatoID, 'Savannah'),
	(@GatoID, 'Scottish Fold'),
	(@GatoID, 'Siamês'),
	(@GatoID, 'Sphynx');

SELECT @Furao := ID
FROM Especie
WHERE nome = 'Furão';

INSERT INTO Raca(especie_ID, nome) VALUES (@Furao, 'Furão_unknown');

SELECT @Mico := ID
FROM Especie
WHERE nome = 'Mico';

INSERT INTO Raca(especie_ID, nome) VALUES (@Mico, 'Mico_unknown');

SELECT @Coelho := ID
FROM Especie
WHERE nome = 'Coelho';

INSERT INTO Raca(especie_ID, nome) VALUES (@Coelho, 'Coelho_unknown');

SELECT @Hamster := ID
FROM Especie
WHERE nome = 'Hamster';

INSERT INTO Raca(especie_ID, nome) VALUES (@Hamster, 'Hamster_unknown');

SELECT @Rato := ID
FROM Especie
WHERE nome = 'Rato';

INSERT INTO Raca(especie_ID, nome) VALUES (@Rato, 'Rato_unknown');

SELECT @Camundongo := ID
FROM Especie
WHERE nome = 'Camundongo';

INSERT INTO Raca(especie_ID, nome) VALUES (@Camundongo, 'Camundongo_unknown');

SELECT @Porco := ID
FROM Especie
WHERE nome = 'Porco';

INSERT INTO Raca(especie_ID, nome) VALUES (@Porco, 'Porco_unknown');

SELECT @Chinchila := ID
FROM Especie
WHERE nome = 'Chinchila';

INSERT INTO Raca(especie_ID, nome) VALUES (@Chinchila, 'Chinchila_unknown');

SELECT @Gerbil := ID
FROM Especie
WHERE nome = 'Gerbil';

INSERT INTO Raca(especie_ID, nome) VALUES (@Gerbil, 'Gerbil_unknown');

SELECT @Esquilo := ID
FROM Especie
WHERE nome = 'Esquilo';

INSERT INTO Raca(especie_ID, nome) VALUES (@Esquilo, 'Esquilo_unknown');

SELECT @Periquito := ID
FROM Especie
WHERE nome = 'Periquito';

INSERT INTO Raca(especie_ID, nome) VALUES (@Periquito, 'Periquito_unknown');

SELECT @Canario := ID
FROM Especie
WHERE nome = 'Canário';

INSERT INTO Raca(especie_ID, nome) VALUES (@Canario, 'Canário_unknown');

SELECT @Caturra := ID
FROM Especie
WHERE nome = 'Caturra';

INSERT INTO Raca(especie_ID, nome) VALUES (@Caturra, 'Caturra_unknown');

SELECT @Cacatuidae := ID
FROM Especie
WHERE nome = 'Cacatuidae';

INSERT INTO Raca(especie_ID, nome) VALUES (@Cacatuidae, 'Cacatuidae_unknown');

SELECT @Papagaio := ID
FROM Especie
WHERE nome = 'Papagaio';

INSERT INTO Raca(especie_ID, nome) VALUES (@Papagaio, 'Papagaio_unknown');

SELECT @Galinha := ID
FROM Especie
WHERE nome = 'Galinha';

INSERT INTO Raca(especie_ID, nome) VALUES (@Galinha, 'Galinha_unknown');

SELECT @Arara := ID
FROM Especie
WHERE nome = 'Arara';

INSERT INTO Raca(especie_ID, nome) VALUES (@Arara, 'Arara_unknown');

SELECT @Mandarim := ID
FROM Especie
WHERE nome = 'Mandarim';

INSERT INTO Raca(especie_ID, nome) VALUES (@Mandarim, 'Mandarim_unknown');

SELECT @Agapornis := ID
FROM Especie
WHERE nome = 'Agapornis';

INSERT INTO Raca(especie_ID, nome) VALUES (@Agapornis, 'Agapornis_unknown');

SELECT @Tucano := ID
FROM Especie
WHERE nome = 'Tucano';

INSERT INTO Raca(especie_ID, nome) VALUES (@Tucano, 'Tucano_unknown');

SELECT @Galah := ID
FROM Especie
WHERE nome = 'Galah';

INSERT INTO Raca(especie_ID, nome) VALUES (@Galah, 'Galah_unknown');

SELECT @Calafate := ID
FROM Especie
WHERE nome = 'Calafate';

INSERT INTO Raca(especie_ID, nome) VALUES (@Calafate, 'Calafate_unknown');

SELECT @Cardeal := ID
FROM Especie
WHERE nome = 'Cardeal';

INSERT INTO Raca(especie_ID, nome) VALUES (@Cardeal, 'Cardeal_unknown');

SELECT @Curio := ID
FROM Especie
WHERE nome = 'Curió';

INSERT INTO Raca(especie_ID, nome) VALUES (@Curio, 'Curió_unknown');

SELECT @Cagado := ID
FROM Especie
WHERE nome = 'Cágado';

INSERT INTO Raca(especie_ID, nome) VALUES (@Cagado, 'Cágado_unknown');

SELECT @Tartaruga := ID
FROM Especie
WHERE nome = 'Tartaruga';

INSERT INTO Raca(especie_ID, nome) VALUES (@Tartaruga, 'Tartaruga_unknown');

SELECT @Jabuti := ID
FROM Especie
WHERE nome = 'Jabuti';

INSERT INTO Raca(especie_ID, nome) VALUES (@Jabuti, 'Jabuti_unknown');

SELECT @Largato := ID
FROM Especie
WHERE nome = 'Largato';

INSERT INTO Raca(especie_ID, nome) VALUES (@Largato, 'Largato_unknown');

SELECT @Cobra := ID
FROM Especie
WHERE nome = 'Cobra';

INSERT INTO Raca(especie_ID, nome) VALUES (@Cobra, 'Cobra_unknown');


INSERT INTO RedeSocial(nome) VALUES
	('RedeSocial_unknown'),
	('behance'),
	('blogger'),
	('dribbble'),
	('facebook'),
	('flickr'),
	('google'),
	('instagram'),
	('linkedin'),
	('pinterest'),
	('tumblr'),
	('twitter'),
	('vimeo'),
	('youtube');
