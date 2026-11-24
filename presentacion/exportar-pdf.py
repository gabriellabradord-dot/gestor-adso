#!/usr/bin/env python3
"""Regenera gestor-adso.pdf desde index.html, una diapositiva por página."""
from pathlib import Path
from playwright.sync_api import sync_playwright

base = Path(__file__).resolve().parent
html = base / "index.html"
pdf = base / "gestor-adso.pdf"

with sync_playwright() as p:
    browser = p.chromium.launch(headless=True)
    page = browser.new_page(viewport={"width": 1280, "height": 720})
    page.goto(html.as_uri(), wait_until="networkidle")
    page.emulate_media(media="print")
    page.pdf(
        path=str(pdf),
        width="13.333in",
        height="7.5in",
        print_background=True,
        margin={"top": "0", "right": "0", "bottom": "0", "left": "0"},
    )
    browser.close()
print(f"PDF generado: {pdf}")
