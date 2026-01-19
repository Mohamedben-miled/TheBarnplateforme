# The Barn – Site statique de présentation

Site web statique (HTML/CSS/JS) pour The Barn, espace de formation permanent à Soukra.

## Description

Site de présentation ciblant les cabinets de formation, associations et clubs recherchant une base de formation permanente avec programmes récurrents sur jours fixes.

## Structure

```
TheBarnp/
├── index.html          # Site complet en une seule page
├── images/             # Images utilisées par le site
│   ├── hero-workspace.jpg
│   ├── community-workshop.jpg
│   ├── Attend.png
│   ├── host.png
│   └── join.png
└── CONVERSION_NOTES.md  # Notes de conversion PHP → HTML statique
```

## Utilisation

Ouvrez simplement `index.html` dans un navigateur web. Aucun serveur ni dépendance requise.

## Technologies

- HTML5
- CSS3 (styles inline)
- JavaScript vanilla (défilement fluide)
- Aucun framework ni bibliothèque externe

## Images utilisées

- `hero-workspace.jpg` - Image hero principale
- `community-workshop.jpg` - Image de fond pour plusieurs sections
- `Attend.png` - Carte "Programmes récurrents"
- `host.png` - Carte "Base de formation stable"
- `join.png` - Carte "Partenariat à long terme"

## Navigation

Le site utilise la navigation par ancres :
- `#hero` - Accueil
- `#amenities` - Équipements
- `#who-for` - Pour qui
- `#how-it-works` - Comment ça fonctionne
- `#partners` - Partenaires
- `#contact` - Contact

## Notes

- Site 100% statique, aucune dépendance serveur
- Tous les styles sont inline dans `index.html`
- JavaScript minimal pour le défilement fluide
- Responsive design intégré
