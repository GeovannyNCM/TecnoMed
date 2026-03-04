const BASE_CATEGORIES = [
  'Cuidados',
  'Diagnostico',
  'Emergencia',
  'Equipos',
  'Intrumental',
  'Insumos',
  'Mobiliario',
  'Indumentaria',
  'Oxigenoterapia'
];

const DEMO_PRODUCTS = [
  {
    id: 'tm_demo_1',
    name: 'Monitor de Signos Vitales TM-500',
    category: 'Equipos',
    description: 'Pantalla multiparámetro para clínicas y consultorios.',
    price: 1250,
    stock: 8,
    image: ''
  },
  {
    id: 'tm_demo_2',
    name: 'Oxímetro de Pulso Pro',
    category: 'Diagnostico',
    description: 'Lectura rápida SpO2 con alarmas visuales.',
    price: 180,
    stock: 25,
    image: ''
  },
  {
    id: 'tm_demo_3',
    name: 'Camilla de Emergencia',
    category: 'Emergencia',
    description: 'Camilla plegable de alta resistencia.',
    price: 420,
    stock: 5,
    image: ''
  }
];

const categoriesEl = document.getElementById('categories');
const productsEl = document.getElementById('products');
const emptyStateEl = document.getElementById('emptyState');
let allProducts = [...DEMO_PRODUCTS];

function bindCategoryEvents() {
  const chips = document.querySelectorAll('#categories .chip');
  chips.forEach(chip => {
    chip.onclick = () => {
      chips.forEach(c => c.classList.remove('active'));
      chip.classList.add('active');
      const selectedCategory = chip.dataset.category || '';
      renderProducts(selectedCategory ? allProducts.filter(p => p.category === selectedCategory) : allProducts);
    };
  });
}

function renderExtraCategories(products) {
  const existing = new Set(Array.from(document.querySelectorAll('#categories .chip')).map(c => c.dataset.category));
  const extras = [...new Set(products.map(p => p.category).filter(Boolean))]
    .filter(category => !BASE_CATEGORIES.includes(category) && !existing.has(category));

  extras.forEach(category => {
    const btn = document.createElement('button');
    btn.textContent = category;
    btn.className = 'chip';
    btn.dataset.category = category;
    categoriesEl.appendChild(btn);
  });

  bindCategoryEvents();
}

function renderProducts(products) {
  productsEl.innerHTML = '';
  if (!products.length) {
    emptyStateEl.classList.remove('hidden');
    return;
  }

  emptyStateEl.classList.add('hidden');
  products.forEach(product => {
    const card = document.createElement('article');
    card.className = 'card';
    card.innerHTML = `
      <img src="${product.image || 'https://via.placeholder.com/600x400?text=TecnoMed'}" alt="${product.name}" />
      <h3>${product.name}</h3>
      <p><strong>Categoría:</strong> ${product.category}</p>
      <p>${product.description || 'Sin descripción'}</p>
      <p><strong>Precio:</strong> $${Number(product.price).toFixed(2)}</p>
      <p><strong>Stock:</strong> ${product.stock}</p>
    `;
    productsEl.appendChild(card);
  });
}

bindCategoryEvents();
renderExtraCategories(allProducts);
renderProducts(allProducts);
