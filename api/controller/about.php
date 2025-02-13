<?php

if (!isset($post['lang'])) API::error('004', 'Impossible de retourner un résultat');

if ($post['lang'] == 'fr'){

    API::success([
        "text_1" => "La solution sûre et garantie à vos besoins de réparation et d'entretien à domicile",
        "text_2" => "Ebricodom est votre solution unique pour un large éventail de besoins d'entretien et de réparation à domicile. Nos techniciens sont des professionnels entièrement assurés. Nous arrivons à l'heure avec les outils pour terminer le travail correctement.",
        "text_3" => "Les techniciens d’Ebricodom sont des artisans hautement qualifiés, Nous sommes des experts de la réparation et de l'amélioration de la maison, et nous sommes connus pour la qualité de notre travail et notre fiabilité professionnelle afin que vous sachiez que le travail sera fait correctement et efficacement.",
        "text_4" => "Qui est Ebricodom ?",
        "text_5" => "Ebricodom est votre consultant personnel en rénovation domiciliaire et une ressource de confiance et bien informée qui fait partie d'une franchise de service nationale de premier plan. Nos techniciens expérimentés et professionnels de réparation et d'amélioration de la maison sont des artisans qualifiés dans les métiers. Nous sommes tellement confiants dans le travail que nous effectuons que chaque travail que nous effectuons, qu'il s'agisse d'une réparation, d'une installation, d'un assemblage ou d'une tâche d'organisation, est soutenu par notre garantie.",
        "text_6" => "Vous n'avez pas de temps à consacrer à un service qui n'est pas fiable, et vous ne devriez pas laisser entrer n'importe qui chez vous. Lorsque vous avez besoin de services de bricoleur professionnels auxquels vous pouvez faire confiance et sur lesquels vous pouvez compter pour bien faire les choses, vous pouvez compter sur Ebricodom.",
        "text_7" => "Les clients réguliers de partout au pays aiment la commodité de travailler avec nous, et nous n'aimons rien de mieux que d'améliorer votre maison; le rendant plus sûr, plus fonctionnel et simplement un endroit plus confortable à vivre. Contactez-nous !!!"
        ]);
        
}else{

    API::success([
        "text_1" => "AR La solution sûre et garantie à vos besoins de réparation et d'entretien à domicile",
        "text_2" => "AR Ebricodom est votre solution unique pour un large éventail de besoins d'entretien et de réparation à domicile. Nos techniciens sont des professionnels entièrement assurés. Nous arrivons à l'heure avec les outils pour terminer le travail correctement.",
        "text_3" => "AR Les techniciens d’Ebricodom sont des artisans hautement qualifiés, Nous sommes des experts de la réparation et de l'amélioration de la maison, et nous sommes connus pour la qualité de notre travail et notre fiabilité professionnelle afin que vous sachiez que le travail sera fait correctement et efficacement.",
        "text_4" => "AR Qui est Ebricodom ?",
        "text_5" => "AR Ebricodom est votre consultant personnel en rénovation domiciliaire et une ressource de confiance et bien informée qui fait partie d'une franchise de service nationale de premier plan. Nos techniciens expérimentés et professionnels de réparation et d'amélioration de la maison sont des artisans qualifiés dans les métiers. Nous sommes tellement confiants dans le travail que nous effectuons que chaque travail que nous effectuons, qu'il s'agisse d'une réparation, d'une installation, d'un assemblage ou d'une tâche d'organisation, est soutenu par notre garantie.",
        "text_6" => "AR Vous n'avez pas de temps à consacrer à un service qui n'est pas fiable, et vous ne devriez pas laisser entrer n'importe qui chez vous. Lorsque vous avez besoin de services de bricoleur professionnels auxquels vous pouvez faire confiance et sur lesquels vous pouvez compter pour bien faire les choses, vous pouvez compter sur Ebricodom.",
        "text_7" => "AR Les clients réguliers de partout au pays aiment la commodité de travailler avec nous, et nous n'aimons rien de mieux que d'améliorer votre maison; le rendant plus sûr, plus fonctionnel et simplement un endroit plus confortable à vivre. Contactez-nous !!!"
    ]);

}