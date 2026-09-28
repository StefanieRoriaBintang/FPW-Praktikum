import sys
from pptx import Presentation

prs = Presentation(sys.argv[1])
print(f"Available slide layouts: {len(prs.slide_layouts)}")
for i, layout in enumerate(prs.slide_layouts):
    print(f"Layout {i}: {layout.name}")
