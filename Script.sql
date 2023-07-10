-- Database
    -- regime
        create database regime;
        \c regime;

-- Tables
    -- Objectifs
        create table objectif(
            id_objectif serial primary key,
            nom_objectif varchar(50)
        );

        -- Donnees
            insert into objectif values(default, 'Gagner du poid'); -- 1
            insert into objectif values(default, 'Perdre du poid'); -- 2

    -- Menu
        create table menu(
            id_menu serial primary key,
            nom_menu varchar(30), 
            image_menu varchar(30)
        );

        -- Données
            INSERT INTO menu (nom_menu, image_menu)
            VALUES
            ('Menu gastronomique', 'gastronomique.jpg'),
            ('Menu vegetarien', 'vegetarien.jpg'),
            ('Menu fruits de mer', 'fruits_de_mer.jpg'),
            ('Menu du terroir', 'terroir.jpg'),
            ('Menu degustation', 'degustation.jpg'),
            ('Menu sante', 'sante.jpg'),
            ('Menu grillades', 'grillades.jpg'),
            ('Menu exotique', 'exotique.jpg'),
            ('Menu italien', 'italien.jpg'),
            ('Menu asiatique', 'asiatique.jpg'),
            ('Menu du chef', 'chef.jpg'),
            ('Menu vegan', 'vegan.jpg'),
            ('Menu sans gluten', 'sans_gluten.jpg'),
            ('Menu fruits frais', 'fruits_frais.jpg'),
            ('Menu gourmand', 'gourmand.jpg'),
            ('Menu du marche', 'marche.jpg'),
            ('Menu a emporter', 'emporter.jpg'),
            ('Menu brunch', 'brunch.jpg'),
            ('Menu du jour', 'jour.jpg'),
            ('Menu enfants', 'enfants.jpg'),
            ('Menu tapas', 'tapas.jpg'),
            ('Menu sushis', 'sushis.jpg'),
            ('Menu pâtes fraîches', 'pates_fraiches.jpg'),
            ('Menu biologique', 'biologique.jpg'),
            ('Menu sans viande', 'sans_viande.jpg'),
            ('Menu poisson frais', 'poisson_frais.jpg'),
            ('Menu vins et fromages', 'vins_fromages.jpg'),
            ('Menu burgers gourmets', 'burgers_gourmets.jpg'),
            ('Menu desserts maison', 'desserts_maison.jpg'),
            ('Menu cafe gourmand', 'cafe_gourmand.jpg'),
            ('Menu antipasti', 'antipasti.jpg'),
            ('Menu cuisine fusion', 'cuisine_fusion.jpg'),
            ('Menu barbecue', 'barbecue.jpg'),
            ('Menu plats traditionnels', 'plats_traditionnels.jpg'),
            ('Menu cocktails', 'cocktails.jpg');

    -- Regime
        create table regime(
            id_regime serial primary key,
            nom_regime varchar(50),
            prix numeric,
            id_objectif int references objectif(id_objectif),
            poid int
        );

        -- Données
            insert into regime values(default, 'REGIME1', 1000000, 1, 10);
            insert into regime values(default, 'REGIME2', 2000000, 2, 20);
            insert into regime values(default, 'REGIME3', 3000000, 1, 30);
            insert into regime values(default, 'REGIME4', 4000000, 2, 40);
            insert into regime values(default, 'REGIME5', 5000000, 1, 50);

    -- Regime_menu
        create table regime_menu(
            id_regime_menu serial primary key,
            id_menu int references menu(id_menu),
            id_regime int references regime(id_regime)
        );

        INSERT INTO regime_menu (id_menu, id_regime)
        SELECT id_menu, 1
        FROM menu
        ORDER BY id_menu
        LIMIT 7 offset 0;

        INSERT INTO regime_menu (id_menu, id_regime)
        SELECT id_menu, 2
        FROM menu
        ORDER BY id_menu
        LIMIT 7 offset 7;

        INSERT INTO regime_menu (id_menu, id_regime)
        SELECT id_menu, 3
        FROM menu
        ORDER BY id_menu
        LIMIT 7 offset 14;

        INSERT INTO regime_menu (id_menu, id_regime)
        SELECT id_menu, 4
        FROM menu
        ORDER BY id_menu
        LIMIT 7 offset 21;

        INSERT INTO regime_menu (id_menu, id_regime)
        SELECT id_menu, 5
        FROM menu
        ORDER BY id_menu
        LIMIT 7 offset 28;

-- Vues
    -- v_last_regime
        create or replace view v_last_regime as select*from regime where id_regime=(select max(id_regime) from regime);

    -- v_regime_objectif
        create or replace view v_regime_objectif as select regime.*, objectif.nom_objectif from regime join objectif on objectif.id_objectif=regime.id_objectif;

    -- v_regime_menu
        create or replace view v_regime_menu as select regime_menu.id_regime_menu, regime.*, menu.* from regime_menu join menu on regime_menu.id_menu=menu.id_menu join regime on regime.id_regime=regime_menu.id_regime;