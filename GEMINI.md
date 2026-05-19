# Landing Page V2 - Project Instructions

## Project Overview

This project aims to refactor and modernize the existing landing page (V1) into a more professional, visually appealing, and performant V2.

## Conventions & Style

- **Aesthetics:** Modern, clean, and professional.
- **Typography:** Justified text (`text-align: justify`) with automatic hyphens (`hyphens: auto`) for paragraphs and descriptions.
- **Frameworks:** Bootstrap is currently used. V2 should leverage modern CSS features and potentially refine Bootstrap usage or move towards a more custom approach if it improves the design.
- **Language:** The site content is in French. Gemini should respond in French.

## Workflow

1. **Research:** Analyze existing files to understand structure and content.
2. **Strategy:** Propose a new design and architecture for V2.
3. **Execution:** Implement changes iteratively.
4. **Validation:** Ensure responsiveness and visual integrity.

## Corrections & Solutions validées (V2)

- **Typographie :** Utilisation de 'Montserrat' pour les titres/UI et 'Merriweather' pour le corps de texte (justifié).
- **Header :** Intégration de la photo ID (`MG-08-07-25-id.jpg`) à gauche du nom "FLORENT GERARD". Design compact et moderne.
- **Arrière-plans (Backgrounds) :** Correction du superzoom via `background-attachment: scroll` (plus stable que `fixed` sur certains supports) et utilisation de la syntaxe shorthand `background: linear-gradient(...) url(...) center center / cover no-repeat`.
- **Mise en page Hero :** Réduction de la taille du titre `display-3` et des paddings pour assurer que la section et ses boutons tiennent dans la hauteur de l'écran (viewport).
- **Contenu :** Restauration stricte des textes originaux de la V1 pour préserver l'authenticité du parcours.
- **Boutons :** Correction du contraste au survol (hover) sur le bouton "Me contacter".
- **Compétences IA :** Mise en avant du Prompt Engineering et de l'utilisation des LLMs (Gemini, Copilot, ChatGPT) dans le CV.
- **Formulaire de contact :** Activation via Formspree (`action="https://formspree.io/f/xykodaoy"`).
- **Navigation :** Harmonisation de `index.html` et `rapports.html` (polices Montserrat/Merriweather).

## Prochaines étapes

1. **Mise en ligne du Projet 5 (Kanap) :** TERMINÉ.
   - Frontend : https://papag57.github.io/P5-Dev-Web-Kanap/
   - Backend : https://p5-dev-web-kanap-lbrs.onrender.com
2. **Mise en ligne du Projet 6 (Hot Takes) :** TERMINÉ.
   - Frontend : https://papag57.github.io/P6-Dev-Web-API-Gastro/
   - Backend : https://p6-dev-web-api-gastro.onrender.com
   - _Correction effectuée :_ Mise à jour des liens sur la Landing Page (V1 et V2). Solution pour l'affichage des images identifiée.
3. **Mise en ligne du Projet 7 (Groupomania) :** EN COURS.
   - Base de données MySQL créée sur Aiven.
   - Backend en cours de déploiement sur Render (configuration Sequelize mise à jour pour SSL/DATABASE_URL).
4. **Optimisation finale SEO et Performance de la V2.**
