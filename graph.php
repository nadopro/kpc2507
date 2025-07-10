
  <script src="https://d3js.org/d3.v7.min.js"></script>
  <style>
    body { margin: 0; overflow: hidden; }
    svg { width: 100vw; height: 100vh; }
    .link { stroke: #aaa; stroke-width: 2px; }
    .node circle { fill: steelblue; stroke: #fff; stroke-width: 1.5px; }
    .label { font: 14px sans-serif; pointer-events: none; }
    .relation { font: 12px sans-serif; fill: #666; pointer-events: none; }
  </style>


  <svg></svg>
  <script>
    const data = {
      nodes: [
        { id: "홍대감" },
        { id: "홍길동" },
        { id: "이율곡" },
        { id: "사임당" },
        { id: "이황" }
      ],
      links: [
        { source: "홍대감", target: "홍길동", relation: "아버지" },
        { source: "홍길동", target: "이율곡", relation: "친구" },
        { source: "사임당", target: "이율곡", relation: "엄마" },
        { source: "이황", target: "이율곡", relation: "스승" }
      ]
    };

    const svg = d3.select("svg");
    const width = window.innerWidth;
    const height = window.innerHeight;

    const zoom = d3.zoom()
      .scaleExtent([0.3, 5])
      .on("zoom", (event) => {
        g.attr("transform", event.transform);
      });

    svg.call(zoom);

    const g = svg.append("g");

    const link = g.selectAll(".link")
      .data(data.links)
      .enter()
      .append("line")
      .attr("class", "link");

    const linkLabel = g.selectAll(".relation")
      .data(data.links)
      .enter()
      .append("text")
      .attr("class", "relation")
      .text(d => d.relation);

    const node = g.selectAll(".node")
      .data(data.nodes)
      .enter()
      .append("g")
      .attr("class", "node")
      .call(d3.drag()
        .on("start", dragstarted)
        .on("drag", dragged)
        .on("end", dragended));

    node.append("circle")
      .attr("r", 15);

    node.append("text")
      .attr("class", "label")
      .attr("x", 20)
      .attr("y", 5)
      .text(d => d.id);

    const simulation = d3.forceSimulation(data.nodes)
      .force("link", d3.forceLink(data.links).id(d => d.id).distance(150))
      .force("charge", d3.forceManyBody().strength(-400))
      .force("center", d3.forceCenter(width / 2, height / 2))
      .on("tick", ticked);

    function ticked() {
      link
        .attr("x1", d => d.source.x)
        .attr("y1", d => d.source.y)
        .attr("x2", d => d.target.x)
        .attr("y2", d => d.target.y);

      linkLabel
        .attr("x", d => (d.source.x + d.target.x) / 2)
        .attr("y", d => (d.source.y + d.target.y) / 2);

      node.attr("transform", d => `translate(${d.x},${d.y})`);
    }

    function dragstarted(event, d) {
      if (!event.active) simulation.alphaTarget(0.3).restart();
      d.fx = d.x;
      d.fy = d.y;
    }

    function dragged(event, d) {
      d.fx = event.x;
      d.fy = event.y;
    }

    function dragended(event, d) {
      if (!event.active) simulation.alphaTarget(0);
      d.fx = null;
      d.fy = null;
    }

    // 우클릭 이동 허용: context menu 막지 않음
    svg.on("contextmenu", (e) => e.preventDefault());
  </script>

