"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const express_1 = __importDefault(require("express"));
const multer_1 = __importDefault(require("multer"));
const multerConfig_1 = require("./src/multerConfig");
const app = (0, express_1.default)();
const upload = (0, multer_1.default)({ storage: multerConfig_1.storage });
app.use('/files', express_1.default.static('files'));
app.post('/upload', upload.single('file'), (req, res) => {
    var _a;
    return res.json((_a = req.file) === null || _a === void 0 ? void 0 : _a.filename);
});
app.listen(process.env.port || '3333', () => console.log('HTTP Server running'));
