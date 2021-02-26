"use strict";

var helpers = require("../../helpers/helpers");

exports["America/Santarem"] = {

	"guess:by:offset" : helpers.makeTestGuess("America/Santarem", { offset: true, expect: "America/Fortaleza" }),

	"guess:by:abbr" : helpers.makeTestGuess("America/Santarem", { abbr: true, expect: "America/Fortaleza" }),

	"1914" : helpers.makeTestYear("America/Santarem", [
		["1914-01-01T03:38:47+00:00", "23:59:59", "LMT", 13128 / 60],
		["1914-01-01T03:38:48+00:00", "23:38:48", "-04", 240]
	]),

	"1931" : helpers.makeTestYear("America/Santarem", [
		["1931-10-03T14:59:59+00:00", "10:59:59", "-04", 240],
		["1931-10-03T15:00:00+00:00", "12:00:00", "-03", 180]
	]),

	"1932" : helpers.makeTestYear("America/Santarem", [
		["1932-04-01T02:59:59+00:00", "23:59:59", "-03", 180],
		["1932-04-01T03:00:00+00:00", "23:00:00", "-04", 240],
		["1932-10-03T03:59:59+00:00", "23:59:59", "-04", 240],
		["1932-10-03T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1933" : helpers.makeTestYear("America/Santarem", [
		["1933-04-01T02:59:59+00:00", "23:59:59", "-03", 180],
		["1933-04-01T03:00:00+00:00", "23:00:00", "-04", 240]
	]),

	"1949" : helpers.makeTestYear("America/Santarem", [
		["1949-12-01T03:59:59+00:00", "23:59:59", "-04", 240],
		["1949-12-01T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1950" : helpers.makeTestYear("America/Santarem", [
		["1950-04-16T03:59:59+00:00", "00:59:59", "-03", 180],
		["1950-04-16T04:00:00+00:00", "00:00:00", "-04", 240],
		["1950-12-01T03:59:59+00:00", "23:59:59", "-04", 240],
		["1950-12-01T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1951" : helpers.makeTestYear("America/Santarem", [
		["1951-04-01T02:59:59+00:00", "23:59:59", "-03", 180],
		["1951-04-01T03:00:00+00:00", "23:00:00", "-04", 240],
		["1951-12-01T03:59:59+00:00", "23:59:59", "-04", 240],
		["1951-12-01T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1952" : helpers.makeTestYear("America/Santarem", [
		["1952-04-01T02:59:59+00:00", "23:59:59", "-03", 180],
		["1952-04-01T03:00:00+00:00", "23:00:00", "-04", 240],
		["1952-12-01T03:59:59+00:00", "23:59:59", "-04", 240],
		["1952-12-01T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1953" : helpers.makeTestYear("America/Santarem", [
		["1953-03-01T02:59:59+00:00", "23:59:59", "-03", 180],
		["1953-03-01T03:00:00+00:00", "23:00:00", "-04", 240]
	]),

	"1963" : helpers.makeTestYear("America/Santarem", [
		["1963-12-09T03:59:59+00:00", "23:59:59", "-04", 240],
		["1963-12-09T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1964" : helpers.makeTestYear("America/Santarem", [
		["1964-03-01T02:59:59+00:00", "23:59:59", "-03", 180],
		["1964-03-01T03:00:00+00:00", "23:00:00", "-04", 240]
	]),

	"1965" : helpers.makeTestYear("America/Santarem", [
		["1965-01-31T03:59:59+00:00", "23:59:59", "-04", 240],
		["1965-01-31T04:00:00+00:00", "01:00:00", "-03", 180],
		["1965-03-31T02:59:59+00:00", "23:59:59", "-03", 180],
		["1965-03-31T03:00:00+00:00", "23:00:00", "-04", 240],
		["1965-12-01T03:59:59+00:00", "23:59:59", "-04", 240],
		["1965-12-01T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1966" : helpers.makeTestYear("America/Santarem", [
		["1966-03-01T02:59:59+00:00", "23:59:59", "-03", 180],
		["1966-03-01T03:00:00+00:00", "23:00:00", "-04", 240],
		["1966-11-01T03:59:59+00:00", "23:59:59", "-04", 240],
		["1966-11-01T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1967" : helpers.makeTestYear("America/Santarem", [
		["1967-03-01T02:59:59+00:00", "23:59:59", "-03", 180],
		["1967-03-01T03:00:00+00:00", "23:00:00", "-04", 240],
		["1967-11-01T03:59:59+00:00", "23:59:59", "-04", 240],
		["1967-11-01T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1968" : helpers.makeTestYear("America/Santarem", [
		["1968-03-01T02:59:59+00:00", "23:59:59", "-03", 180],
		["1968-03-01T03:00:00+00:00", "23:00:00", "-04", 240]
	]),

	"1985" : helpers.makeTestYear("America/Santarem", [
		["1985-11-02T03:59:59+00:00", "23:59:59", "-04", 240],
		["1985-11-02T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1986" : helpers.makeTestYear("America/Santarem", [
		["1986-03-15T02:59:59+00:00", "23:59:59", "-03", 180],
		["1986-03-15T03:00:00+00:00", "23:00:00", "-04", 240],
		["1986-10-25T03:59:59+00:00", "23:59:59", "-04", 240],
		["1986-10-25T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1987" : helpers.makeTestYear("America/Santarem", [
		["1987-02-14T02:59:59+00:00", "23:59:59", "-03", 180],
		["1987-02-14T03:00:00+00:00", "23:00:00", "-04", 240],
		["1987-10-25T03:59:59+00:00", "23:59:59", "-04", 240],
		["1987-10-25T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1988" : helpers.makeTestYear("America/Santarem", [
		["1988-02-07T02:59:59+00:00", "23:59:59", "-03", 180],
		["1988-02-07T03:00:00+00:00", "23:00:00", "-04", 240]
	]),

	"2008" : helpers.makeTestYear("America/Santarem", [
		["2008-06-24T03:59:59+00:00", "23:59:59", "-04", 240],
		["2008-06-24T04:00:00+00:00", "01:00:00", "-03", 180]
	])
};