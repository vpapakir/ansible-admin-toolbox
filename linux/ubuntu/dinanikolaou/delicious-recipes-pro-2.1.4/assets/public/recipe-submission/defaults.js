const detailFields = {
    title: "",
    featuredImage: "",
    featuredImageUrl: "",
    description: "",
    cookingMethods: [],
    cuisines: [],
    courses: [],
    recipeKeys: [],
    recipeBadges: [],
	recipeDietaries: []
};

const infoFields = {
    recipeSubtitle: "",
    recipeDescription: "",
    recipeKeywords: "",
    difficultyLevel: "",
    prepTime: "",
    prepTimeUnit: "min",
    cookTime: "",
    cookTimeUnit: "min",
	cookTemp: "",
	cookTempUnit: "C",
    restTime: "",
    restTimeUnit: "min",
    recipeCalories: "",
    bestSeason: "",
	estimatedCost: "",
	estimatedCostCurr: ""
};

const ingredientsFields = {
    noOfServings: "",
    recipeIngredients: [
        {
            sectionTitle: "",
            ingredients: [
                {
                    quantity: "",
                    unit: "",
                    ingredient: "",
                    notes: "",
                },
            ],
        },
    ],
};

const instructionFields = {
    recipeInstructions: [
        {
            sectionTitle: "",
            instruction: [
                {
                    instructionTitle: "",
                    instruction: "",
                    image: "",
                    image_preview: "",
                    videoURL: "",
                    instructionNotes: "",
                },
            ],
        },
    ],
};

const galleryFields = {
    enableImageGallery: ["yes"],
    imageGalleryImages: [],
    enableVideoGallery: ["yes"],
    videoGalleryVids: [],
};

const nutritionFields = {
    servingSize: "",
    servings: "",
    calories: "",
    caloriesFromFat: "",
    totalFat: "",
    saturatedFat: "",
    transFat: "",
    cholesterol: "",
    sodium: "",
    potassium: "",
    totalCarbohydrate: "",
    dietaryFiber: "",
    sugars: "",
    protein: "",
    vitaminA: "",
    vitaminC: "",
    calcium: "",
    iron: "",
    vitaminD: "",
    vitaminE: "",
    vitaminK: "",
    thiamin: "",
    riboflavin: "",
    niacin: "",
    vitaminB6: "",
    folate: "",
    vitaminB12: "",
    biotin: "",
    pantothenicAcid: "",
    phosphorus: "",
    iodine: "",
    magnesium: "",
    zinc: "",
    selenium: "",
    copper: "",
    manganese: "",
    chromium: "",
    molybdenum: "",
    chloride: "",
};

const notesFields = {
    recipeNotes: "",
    adminNotes: "",
};

export { detailFields, infoFields, ingredientsFields, instructionFields, galleryFields, nutritionFields, notesFields };